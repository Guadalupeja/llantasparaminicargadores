{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($staticUrls as $staticUrl)
        <url>
            <loc>{{ $staticUrl }}</loc>
        </url>
    @endforeach

    @foreach ($products as $product)
        <url>
            <loc>
                @if ($product->category->slug === 'llantas-solidas-para-minicargador')
                    {{ url('/llantas-solidas-para-minicargador/' . $product->slug) }}
                @else
                    {{ url('/llantas-neumaticas-para-minicargador/' . $product->slug) }}
                @endif
            </loc>
        </url>
    @endforeach
</urlset>