<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageVariantService
{
    protected ImageManager $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    public function generate(string $relativePath, array $widths = []): void
    {
        $extension = strtolower(pathinfo($relativePath, PATHINFO_EXTENSION));

        if (! in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'avif'])) {
            return;
        }

        $sourceDisk = Storage::disk('public');
        $originalPath = 'originals/' . ltrim($relativePath, '/');

        if (! $sourceDisk->exists($originalPath)) {
            return;
        }

        $imageContents = $sourceDisk->get($originalPath);
        $image = $this->manager->read($imageContents);

        $pathInfo = pathinfo($relativePath);
        $dir = ($pathInfo['dirname'] ?? '.') !== '.' ? $pathInfo['dirname'] : '';
        $filename = $pathInfo['filename'] ?? 'image';

        $originalWidth = $image->width();

        $profile = $this->resolveProfile($relativePath);

        $widths = ! empty($widths) ? $widths : $profile['widths'];

        $widths = collect($widths)
            ->filter(fn ($width) => is_numeric($width) && (int) $width > 0)
            ->map(fn ($width) => (int) $width)
            ->filter(fn ($width) => $width <= $originalWidth)
            ->unique()
            ->sort()
            ->values();

        if (! $widths->contains($originalWidth)) {
            $widths->push($originalWidth);
        }

        $widths = $widths->unique()->sort()->values();

        $baseDir = 'variants/' . ($dir ? $dir . '/' : '');

        foreach ($widths as $width) {
            $resized = $image->scale(width: $width);

            $avifPath = $baseDir . $filename . '-' . $width . '.avif';
            $webpPath = $baseDir . $filename . '-' . $width . '.webp';
            $jpgPath  = $baseDir . $filename . '-' . $width . '.jpg';

            $sourceDisk->put($avifPath, (string) $resized->toAvif(quality: $profile['quality']['avif']));
            $sourceDisk->put($webpPath, (string) $resized->toWebp(quality: $profile['quality']['webp']));
            $sourceDisk->put($jpgPath, (string) $resized->toJpeg(quality: $profile['quality']['jpg']));
        }
    }

    protected function resolveProfile(string $relativePath): array
    {
        $path = strtolower($relativePath);

        if (
            str_contains($path, 'landings/') ||
            str_contains($path, 'hero') ||
            str_contains($path, 'banner')
        ) {
            return [
                'widths' => [768, 1024, 1366, 1600, 1920, 2200, 2600],
                'quality' => [
                    'avif' => 86,
                    'webp' => 90,
                    'jpg'  => 92,
                ],
            ];
        }

        if (
            str_contains($path, 'chat/') ||
            str_contains($path, 'card') ||
            str_contains($path, 'thumb')
        ) {
            return [
                'widths' => [320, 480, 768, 1024],
                'quality' => [
                    'avif' => 80,
                    'webp' => 86,
                    'jpg'  => 90,
                ],
            ];
        }

        return [
            'widths' => [320, 480, 768, 1024, 1366, 1600, 1920, 2200],
            'quality' => [
                'avif' => 82,
                'webp' => 88,
                'jpg'  => 90,
            ],
        ];
    }
}