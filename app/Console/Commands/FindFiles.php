<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\FileManagement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FindFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:find-files';

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
        $this->info('Starting storage scan...');
        DB::table('file_management')->delete();

        $disks = [
            0 => "local",
            1 => "public",
        ];

        if (empty($disks)) {
            $this->error('No disks configured in filesystems.php');
            return 1;
        }

        $total = 0;

        foreach ($disks as $disk) {
            $this->line("Scanning disk: {$disk}");

            try {
                $diskInstance = Storage::disk($disk);
                /** @var \Illuminate\Filesystem\FilesystemAdapter $diskInstance */
                $files = $diskInstance->allFiles();
            } catch (\Throwable $e) {
                $this->error("Failed to read disk {$disk}: " . $e->getMessage());
                continue;
            }

            foreach ($files as $path) {
                $total++;

                $size = null;
                $mime = null;
                $isPublic = null;
                $metadata = [
                    'last_modified' => null,
                ];

                try {
                    $size = $diskInstance->size($path);
                } catch (\Throwable $e) {
                    // ignore
                }

                try {
                    $mime = $diskInstance->mimeType($path);
                } catch (\Throwable $e) {
                    // fallback to null
                }

                // Determine visibility (if supported)
                try {
                    if (method_exists($diskInstance, 'getVisibility')) {
                        $vis = $diskInstance->getVisibility($path);
                        $isPublic = ($vis === 'public');
                    }
                } catch (\Throwable $e) {
                    // ignore
                }

                try {
                    $last = $diskInstance->lastModified($path);
                    $metadata['last_modified'] = $last;
                } catch (\Throwable $e) {
                    // ignore
                }

                // Upsert by disk + path
                $record = FileManagement::updateOrCreate(
                    [
                        'disk' => $disk,
                        'path' => $path,
                    ],
                    [
                        'filename' => basename($path),
                        'mime_type' => $mime,
                        'size' => $size,
                        'is_public' => $isPublic,
                        'metadata' => json_encode($metadata),
                    ]
                );

                // optional progress output
                if ($total % 100 === 0) {
                    $this->info("Processed {$total} files...");
                }
            }
        }

        $this->info("Scan complete. Total files processed: {$total}");

        return 0;
    }
}
