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

    $widths = [320, 480, 768, 1024, 1366, 1600, 1920, 2200, 2600];

    $pathInfo = pathinfo($path);
    $dir = ($pathInfo['dirname'] ?? '.') !== '.' ? $pathInfo['dirname'] . '/' : '';
    $filename = $pathInfo['filename'] ?? 'image';
    $extension = strtolower($pathInfo['extension'] ?? 'jpg');

    $disk = Storage::disk('public');

    $avif = [];
    $webp = [];
    $jpeg = [];

    foreach ($widths as $w) {
        $avifFile = "variants/{$dir}{$filename}-{$w}.avif";
        $webpFile = "variants/{$dir}{$filename}-{$w}.webp";
        $jpgFile  = "variants/{$dir}{$filename}-{$w}.jpg";

        if ($disk->exists($avifFile)) {
            $avif[] = asset("storage/{$avifFile}") . " {$w}w";
        }

        if ($disk->exists($webpFile)) {
            $webp[] = asset("storage/{$webpFile}") . " {$w}w";
        }

        if ($disk->exists($jpgFile)) {
            $jpeg[] = asset("storage/{$jpgFile}") . " {$w}w";
        }
    }

    $originalFallback = asset("storage/originals/{$path}");

    $fallbackSrc = count($jpeg)
        ? asset("storage/variants/{$dir}{$filename}-" . collect($widths)->reverse()->first(fn ($w) => $disk->exists("variants/{$dir}{$filename}-{$w}.jpg")) . ".jpg")
        : $originalFallback;

    $fallbackType = in_array($extension, ['png', 'webp', 'avif']) ? "image/{$extension}" : 'image/jpeg';
@endphp

<picture>
    @if(count($avif))
        <source
            type="image/avif"
            srcset="{{ implode(', ', $avif) }}"
            sizes="{{ $sizes }}"
        >
    @endif

    @if(count($webp))
        <source
            type="image/webp"
            srcset="{{ implode(', ', $webp) }}"
            sizes="{{ $sizes }}"
        >
    @endif

    @if(count($jpeg))
        <source
            type="{{ $fallbackType }}"
            srcset="{{ implode(', ', $jpeg) }}"
            sizes="{{ $sizes }}"
        >
    @endif

    <img
        src="{{ $fallbackSrc }}"
        alt="{{ $alt }}"
        class="{{ $class }}"
        @if(count($jpeg)) srcset="{{ implode(', ', $jpeg) }}" @endif
        sizes="{{ $sizes }}"
        loading="{{ $lazy ? 'lazy' : 'eager' }}"
        decoding="async"
        @if($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
    >
</picture>