<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:backup-databases {--connection= : Database connection name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting database backup...');

        $diskPath = storage_path('app/private/backups');
        if (!is_dir($diskPath)) {
            mkdir($diskPath, 0755, true);
        }

        $connections = config('database.connections');
        $default = config('database.default');

        // Backup only the default connection by default
        $connName = $this->option('connection') ?? $default;

        $this->info("Using connection: $connName");

        if (!isset($connections[$connName])) {
            $this->error("Connection '$connName' not found in database.connections");
            return 1;
        }

        $conn = $connections[$connName];
        $driver = $conn['driver'] ?? 'mysql';

        $timestamp = date('Ymd_His');
        $app = str_replace(' ', '_', config('app.name', 'laravel'));
        $filename = "$app-{$connName}-$timestamp.sql";
        $outPath = $diskPath . DIRECTORY_SEPARATOR . $filename;

        try {
            switch ($driver) {
                case 'mysql':
                    $this->backupMysql($conn, $outPath);
                    break;
                case 'pgsql':
                case 'postgres':
                    $this->backupPgsql($conn, $outPath);
                    break;
                case 'sqlite':
                    $this->backupSqlite($conn, $outPath);
                    break;
                default:
                    $this->error("Driver '$driver' is not supported by this command.");
                    return 1;
            }

            // compress
            $gzPath = $outPath . '.gz';
            $fpIn = fopen($outPath, 'rb');
            $fpOut = gzopen($gzPath, 'wb9');
            if ($fpIn && $fpOut) {
                while (!feof($fpIn)) {
                    gzwrite($fpOut, fread($fpIn, 1024 * 512));
                }
                fclose($fpIn);
                gzclose($fpOut);
                unlink($outPath);
            }

            $this->info("Backup completed: $gzPath");
            return 0;
        } catch (\Exception $e) {
            $this->error('Backup failed: ' . $e->getMessage());
            return 1;
        }
    }

    /**
     * Build and run mysqldump
     */
    protected function backupMysql(array $conn, string $outPath)
    {
        $host = $conn['host'] ?? env('DB_HOST', '127.0.0.1');
        $port = $conn['port'] ?? env('DB_PORT', '3306');
        $database = $conn['database'] ?? env('DB_DATABASE');
        $username = $conn['username'] ?? env('DB_USERNAME');
        $password = $conn['password'] ?? env('DB_PASSWORD');

        if (is_null($database)) {
            throw new \RuntimeException('MySQL database name is not configured.');
        }

        $dumpPath = config('app.mysqldump_path', 'mysqldump');

        // build command
        $cmd = [];
        $cmd[] = escapeshellcmd($dumpPath);
        $cmd[] = "--host=" . escapeshellarg($host);
        $cmd[] = "--port=" . escapeshellarg($port);
        $cmd[] = "--user=" . escapeshellarg($username);
        if (!empty($password)) {
            $cmd[] = "--password=" . escapeshellarg($password);
        }
        $cmd[] = "--single-transaction --quick --routines --events";
        $cmd[] = escapeshellarg($database);

        $full = implode(' ', $cmd) . ' > ' . escapeshellarg($outPath);

        $this->info('Running: mysqldump ...');
        $ret = null;
        system($full, $ret);
        if ($ret !== 0) {
            throw new \RuntimeException("mysqldump exited with code $ret");
        }
    }

    /**
     * Build and run pg_dump
     */
    protected function backupPgsql(array $conn, string $outPath)
    {
        $host = $conn['host'] ?? env('DB_HOST', '127.0.0.1');
        $port = $conn['port'] ?? env('DB_PORT', '5432');
        $database = $conn['database'] ?? env('DB_DATABASE');
        $username = $conn['username'] ?? env('DB_USERNAME');
        $password = $conn['password'] ?? env('DB_PASSWORD');

        if (is_null($database)) {
            throw new \RuntimeException('Postgres database name is not configured.');
        }

        $dumpPath = config('app.pg_dump_path', 'pg_dump');

        $env = [];
        if (!empty($password)) {
            $env['PGPASSWORD'] = $password;
        }

        $cmd = [];
        $cmd[] = escapeshellcmd($dumpPath);
        $cmd[] = "--host=" . escapeshellarg($host);
        $cmd[] = "--port=" . escapeshellarg($port);
        $cmd[] = "--username=" . escapeshellarg($username);
        $cmd[] = "--format=plain --no-owner --no-acl";
        $cmd[] = escapeshellarg($database);

        $full = implode(' ', $cmd) . ' > ' . escapeshellarg($outPath);

        $this->info('Running: pg_dump ...');

        // set env for command
        foreach ($env as $k => $v) {
            putenv("$k=$v");
        }

        $ret = null;
        system($full, $ret);
        if ($ret !== 0) {
            throw new \RuntimeException("pg_dump exited with code $ret");
        }
    }

    /**
     * Copy sqlite file
     */
    protected function backupSqlite(array $conn, string $outPath)
    {
        $database = $conn['database'] ?? env('DB_DATABASE');
        if (empty($database)) {
            throw new \RuntimeException('SQLite database path not configured.');
        }

        // if relative path like database/database.sqlite
        $dbPath = $database;
        if (!file_exists($dbPath)) {
            // try database path relative to base path
            $alt = base_path($database);
            if (file_exists($alt)) {
                $dbPath = $alt;
            } else {
                throw new \RuntimeException("SQLite database file not found: $database");
            }
        }

        if (!copy($dbPath, $outPath)) {
            throw new \RuntimeException('Failed to copy sqlite database file.');
        }
    }

    // Options are declared on the $signature property
}
