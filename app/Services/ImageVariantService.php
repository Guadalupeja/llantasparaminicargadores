<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageVariantService
{
    protected ImageManager $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    public function generate(string $relativePath, array $widths = [320, 480, 768, 1024, 1366, 1600, 1920, 2200]): void
    {
        $sourceDisk = Storage::disk('public');

        $originalPath = 'originals/' . ltrim($relativePath, '/');

        if (! $sourceDisk->exists($originalPath)) {
            return;
        }

        $imageContents = $sourceDisk->get($originalPath);
        $image = $this->manager->read($imageContents);

        $pathInfo = pathinfo($relativePath);
        $dir = $pathInfo['dirname'] !== '.' ? $pathInfo['dirname'] : '';
        $filename = $pathInfo['filename'];

$originalWidth = $image->width();

foreach ($widths as $width) {
    if ($width > $originalWidth) {
        continue;
    }

    $resized = $image->scale(width: $width);

            $baseDir = 'variants/' . ($dir ? $dir . '/' : '');

            $avifPath = $baseDir . $filename . '-' . $width . '.avif';
            $webpPath = $baseDir . $filename . '-' . $width . '.webp';
            $jpgPath  = $baseDir . $filename . '-' . $width . '.jpg';

            $sourceDisk->put($avifPath, (string) $resized->toAvif(quality: 82));
            $sourceDisk->put($webpPath, (string) $resized->toWebp(quality: 88));
            $sourceDisk->put($jpgPath, (string) $resized->toJpeg(quality: 90));
        }
    }
}