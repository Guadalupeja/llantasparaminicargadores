<?php

namespace App\Console\Commands;

use App\Services\ImageVariantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateResponsiveImages extends Command
{
    protected $signature = 'images:generate {path?}';
    protected $description = 'Genera variantes responsivas AVIF, WebP y JPG';

    public function handle(ImageVariantService $service): int
    {
        $path = $this->argument('path');

        $files = collect(Storage::disk('public')->allFiles('originals'))
    ->filter(function ($path) {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        return in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'avif']);
    })
    ->values()
    ->all();

        foreach ($files as $file) {
            $relative = str_replace('originals/', '', $file);

            if ($path && !str_starts_with($relative, $path)) {
                continue;
            }

            $this->info("Generando variantes para: {$relative}");
            $service->generate($relative);
        }

        $this->info('Variantes generadas correctamente.');

        return self::SUCCESS;
    }
}