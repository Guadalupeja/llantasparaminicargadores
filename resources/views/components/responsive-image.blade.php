@props([
    'path',
    'alt' => '',
    'class' => '',
    'sizes' => '100vw',
    'lazy' => true,
    'fetchpriority' => null,
])

@php
    use Illuminate\Support\Facades\Storage;

    $widths = [320, 480, 768, 1024, 1366, 1600, 1920];

    $pathInfo = pathinfo($path);
    $dir = ($pathInfo['dirname'] ?? '.') !== '.' ? $pathInfo['dirname'] . '/' : '';
    $filename = $pathInfo['filename'] ?? 'image';

    $disk = Storage::disk('public');

    $avif = [];
    $webp = [];

    foreach ($widths as $w) {
        $avifFile = "variants/{$dir}{$filename}-{$w}.avif";
        $webpFile = "variants/{$dir}{$filename}-{$w}.webp";

        if ($disk->exists($avifFile)) {
            $avif[] = asset("storage/{$avifFile}") . " {$w}w";
        }

        if ($disk->exists($webpFile)) {
            $webp[] = asset("storage/{$webpFile}") . " {$w}w";
        }
    }

    $fallback = asset("storage/originals/{$path}");
@endphp

<picture>
    @if(count($avif))
        <source type="image/avif" srcset="{{ implode(', ', $avif) }}" sizes="{{ $sizes }}">
    @endif

    @if(count($webp))
        <source type="image/webp" srcset="{{ implode(', ', $webp) }}" sizes="{{ $sizes }}">
    @endif

    {{-- 🔥 ESTE ES EL CAMBIO CLAVE --}}
    <img
        src="{{ $fallback }}"
        alt="{{ $alt }}"
        class="{{ $class }}"
        sizes="{{ $sizes }}"
        loading="{{ $lazy ? 'lazy' : 'eager' }}"
        decoding="async"
        @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
    >
</picture>