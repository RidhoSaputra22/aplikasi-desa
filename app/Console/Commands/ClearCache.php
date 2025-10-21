<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clear application cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $disks = ['public', 'local'];

        // allowed image extensions
        $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];

        // directories to exclude from cleaning, keyed by disk name
        // paths are relative to the disk root and should end with a slash for directories
        $exceptions = [
            'public' => [
                'banner/', // exclude everything under storage/app/public/banner
                'assets/'
            ],
            // 'private' => [ 'some/dir/' ],
        ];



        // summary counters
        $deletedCount = 0;
        $checkedCount = 0;

        // tables to exclude from DB scanning (filenames or large tables storing filenames)
        $excludedTables = [
            'file_management',
        ];

        try {
            $dbName = DB::getDatabaseName();

            // load text-like columns from information_schema (MySQL)
            $cols = DB::table('information_schema.COLUMNS')
                ->select('TABLE_NAME', 'COLUMN_NAME')
                ->where('TABLE_SCHEMA', $dbName)
                ->whereIn('DATA_TYPE', ['char', 'varchar', 'text', 'mediumtext', 'longtext'])
                ->get();

            $columnsByTable = [];
            foreach ($cols as $c) {
                // skip excluded tables
                if (in_array($c->TABLE_NAME, $excludedTables, true)) {
                    continue;
                }
                $columnsByTable[$c->TABLE_NAME][] = $c->COLUMN_NAME;
            }
        } catch (\Throwable $e) {
            $this->error('Unable to read information_schema.COLUMNS: ' . $e->getMessage());
            return 1;
        }

        foreach ($disks as $disk) {
            if (!config("filesystems.disks.{$disk}")) {
                $this->line("Disk '{$disk}' not configured; skipping.");
                continue;
            }

            $this->line("Scanning disk: {$disk}");

            $files = Storage::disk($disk)->allFiles();

            foreach ($files as $file) {
                // skip files that are in the exceptions list for this disk
                $skip = false;
                if (! empty($exceptions[$disk] ?? [])) {
                    foreach ($exceptions[$disk] as $ex) {
                        $ex = trim($ex, '\/');
                        if ($ex === '') {
                            continue;
                        }

                        // match if file is exactly the path or starts with the directory prefix
                        if ($file === $ex || strpos($file, $ex . '/') === 0) {
                            $skip = true;
                            break;
                        }
                    }
                }

                if ($skip) {
                    $this->line("Excluded [{$disk}] {$file}");
                    continue;
                }

                $checkedCount++;

                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (!in_array($ext, $extensions, true)) {
                    // skip non-image files
                    continue;
                }

                $basename = pathinfo($file, PATHINFO_BASENAME);
                $used = false;

                // search filename in text columns across all tables
                foreach ($columnsByTable as $table => $columns) {
                    foreach ($columns as $column) {
                        try {
                            if (DB::table($table)->where($column, 'like', '%' . $basename . '%')->exists()) {
                                $used = true;
                                break 2;
                            }
                        } catch (\Throwable $e) {
                            // ignore query errors for specific tables/columns and continue
                            continue;
                        }
                    }
                }

                if (! $used) {
                    try {
                        Storage::disk($disk)->delete($file);
                        $deletedCount++;
                        $this->info("Deleted [{$disk}] {$file}");
                    } catch (\Throwable $e) {
                        $this->error("Failed to delete [{$disk}] {$file}: " . $e->getMessage());
                    }
                } else {
                    $this->line("In use [{$disk}] {$file}");
                }
            }
        }

        $this->info("Scan complete. Checked files: {$checkedCount}. Deleted files: {$deletedCount}.");

        return 0;
    }
}
