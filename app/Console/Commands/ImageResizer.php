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
                            {--quality= : Output quality (0-100) (default 85)}';

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

        // Default threshold (KB) can be overridden by --threshold option
        $thresholdKb = (int) $this->option('threshold') ?: 500; // 500 KB default
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

            $this->line("Scanning disk: {$disk}");
            $files = Storage::disk($disk)->allFiles();

            foreach ($files as $file) {
                $counters['scanned']++;

                // Quick extension filter for common raster formats
                $ext = Str::lower(pathinfo($file, PATHINFO_EXTENSION));
                if (! in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'tiff', 'tif', 'svg'])) {
                    $counters['skipped_non_image']++;
                    continue;
                }

                // Skip SVG (vector)
                if ($ext === 'svg') {
                    $counters['skipped_non_image']++;
                    continue;
                }

                try {
                    $sizeBytes = Storage::disk($disk)->size($file);
                } catch (\Exception $e) {
                    $this->error("Failed to get size for {$file} on {$disk}: {$e->getMessage()}");
                    $counters['errors']++;
                    continue;
                }

                if ($sizeBytes <= ($thresholdKb * 1024)) {
                    $counters['skipped_light']++;
                    continue;
                }

                // Heavy image -> resize
                try {
                    $contents = Storage::disk($disk)->get($file);

                    // create image resource from string (supports many formats)
                    $srcImg = @imagecreatefromstring($contents);
                    if (! $srcImg) {
                        $this->warn("Skipping (cannot parse image): {$file}");
                        $counters['skipped_non_image']++;
                        continue;
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
            }
        }

        $this->info('Done. Summary:');
        $this->table(['metric', 'count'], collect($counters)->map(function ($v, $k) {
            return [$k, $v];
        })->values()->toArray());

        return 0;
    }
}
