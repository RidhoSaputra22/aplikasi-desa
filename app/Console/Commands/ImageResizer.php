<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageResizer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:image-resizer
                            {--threshold= : Threshold in KB to consider an image "heavy" (default 500)}
                            {--max-width= : Maximum width after resize (px) (default 1920)}
                            {--max-height= : Maximum height after resize (px) (default 1080)}
                            {--quality= : Output quality (0-100) (default 85)}
                            {--file= : Optional single file path to process (disk relative path). If provided, only this file is processed}';

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
        $disks = ['public', 'local'];

        // If --file option provided, process only that one file (search disks)
        $singleFile = $this->option('file');

        // Default threshold (KB) can be overridden by --threshold option
        $thresholdKb = (int) $this->option('threshold') ?: 10; // 500 KB default
        $maxWidth = (int) $this->option('max-width') ?: 1920;
        $maxHeight = (int) $this->option('max-height') ?: 1080;
        $quality = (int) $this->option('quality') ?: 85; // JPEG/WEBP percent

        $this->info("Starting image resizer. Threshold={$thresholdKb}KB, max={$maxWidth}x{$maxHeight}, quality={$quality}");

        $counters = ['scanned' => 0, 'skipped_light' => 0, 'skipped_non_image' => 0, 'resized' => 0, 'errors' => 0];

        foreach ($disks as $disk) {
            if (! Storage::disk($disk)) {
                $this->warn("Storage disk '{$disk}' not found. Skipping.");
                continue;
            }

            // If a single file is requested, try to process it on the first disk that contains it
            if ($singleFile) {
                $this->line("Looking for single file on disk: {$disk}");
                if (Storage::disk($disk)->exists($singleFile)) {
                    $counters['scanned']++;
                    $result = $this->processFile($disk, $singleFile, $thresholdKb, $maxWidth, $maxHeight, $quality);
                    foreach ($result as $k => $v) {
                        if (isset($counters[$k])) $counters[$k] += $v;
                    }
                    // Once processed, no need to search other disks
                    break;
                }
                // not found on this disk -> continue to next disk
                continue;
            }

            $this->line("Scanning disk: {$disk}");
            $files = Storage::disk($disk)->allFiles();

            foreach ($files as $file) {
                $counters['scanned']++;

                $result = $this->processFile($disk, $file, $thresholdKb, $maxWidth, $maxHeight, $quality);
                foreach ($result as $k => $v) {
                    if (isset($counters[$k])) $counters[$k] += $v;
                }
            }
        }

        // If a single file was requested but not found at all, warn the user
        if ($singleFile) {
            $found = $counters['resized'] > 0 || $counters['skipped_light'] > 0 || $counters['skipped_non_image'] > 0 || $counters['errors'] > 0;
            if (! $found) {
                $this->warn("File '{$singleFile}' was not found on any configured disk.");
            }
        }

        $this->info('Done. Summary:');
        $this->table(['metric', 'count'], collect($counters)->map(function ($v, $k) {
            return [$k, $v];
        })->values()->toArray());

        return 0;
    }

    /**
     * Process a single file (validates, checks threshold, resizes and writes back).
     * Returns an array of counters to be merged into overall counters.
     *
     * @return array<string,int>
     */
    private function processFile(string $disk, string $file, int $thresholdKb, int $maxWidth, int $maxHeight, int $quality): array
    {
        $counters = ['scanned' => 0, 'skipped_light' => 0, 'skipped_non_image' => 0, 'resized' => 0, 'errors' => 0];

        // Quick extension filter for common raster formats
        $ext = Str::lower(pathinfo($file, PATHINFO_EXTENSION));
        if (! in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'tiff', 'tif', 'svg'])) {
            $counters['skipped_non_image']++;
            return $counters;
        }

        // Skip SVG (vector)
        if ($ext === 'svg') {
            $counters['skipped_non_image']++;
            return $counters;
        }

        try {
            $sizeBytes = Storage::disk($disk)->size($file);
        } catch (\Exception $e) {
            $this->error("Failed to get size for {$file} on {$disk}: {$e->getMessage()}");
            $counters['errors']++;
            return $counters;
        }

        if ($sizeBytes <= ($thresholdKb * 1024)) {
            $counters['skipped_light']++;
            return $counters;
        }

        // Heavy image -> resize
        try {
            $contents = Storage::disk($disk)->get($file);

            // create image resource from string (supports many formats)
            $srcImg = @imagecreatefromstring($contents);
            if (! $srcImg) {
                $this->warn("Skipping (cannot parse image): {$file}");
                $counters['skipped_non_image']++;
                return $counters;
            }

            $width = imagesx($srcImg);
            $height = imagesy($srcImg);

            $scale = min($maxWidth / $width, $maxHeight / $height, 1);
            if ($scale >= 1) {
                // image already within bounds, just re-encode to save bytes (optional)
                $newImg = $srcImg;
            } else {
                $newW = (int) round($width * $scale);
                $newH = (int) round($height * $scale);
                $newImg = imagecreatetruecolor($newW, $newH);

                // Preserve transparency for PNG/GIF/WebP
                imagealphablending($newImg, false);
                imagesavealpha($newImg, true);

                imagecopyresampled($newImg, $srcImg, 0, 0, 0, 0, $newW, $newH, $width, $height);

                if (is_resource($srcImg) || $srcImg instanceof \GdImage) {
                    imagedestroy($srcImg);
                }
            }

            // Determine mime from extension for saving
            $ext = Str::lower(pathinfo($file, PATHINFO_EXTENSION));
            ob_start();
            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($newImg, null, $quality);
                    break;
                case 'png':
                    // Convert quality percent (0-100) to compression level (0-9)
                    $pngCompression = (int) round((100 - $quality) / 11.111111);
                    if ($pngCompression < 0) $pngCompression = 0;
                    if ($pngCompression > 9) $pngCompression = 9;
                    imagepng($newImg, null, $pngCompression);
                    break;
                case 'webp':
                    if (function_exists('imagewebp')) {
                        imagewebp($newImg, null, $quality);
                    } else {
                        // fallback to jpeg
                        imagejpeg($newImg, null, $quality);
                    }
                    break;
                case 'gif':
                    imagegif($newImg);
                    break;
                default:
                    // default to jpeg
                    imagejpeg($newImg, null, $quality);
                    break;
            }
            $imgData = ob_get_clean();

            // write back
            Storage::disk($disk)->put($file, $imgData);

            if (isset($newImg) && (is_resource($newImg) || $newImg instanceof \GdImage)) {
                imagedestroy($newImg);
            }

            $counters['resized']++;
            $kb = round($sizeBytes / 1024, 1);
            $this->line("Resized: {$file} ({$kb} KB)");
        } catch (\Exception $e) {
            $this->error("Error processing {$file} on {$disk}: {$e->getMessage()}");
            $counters['errors']++;
        }

        return $counters;
    }
}
