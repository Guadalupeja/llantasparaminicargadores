<?php

namespace Tests\Unit;

use App\Http\Controllers\PageController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use ReflectionClass;
use Tests\TestCase;

class MinicargadorCatalogLivePriceTest extends TestCase
{
    public function test_catalog_uses_live_prices_for_all_woo_products(): void
    {
        Cache::flush();

        config([
            'services.ruguex_prices.endpoint' => 'https://prices.test/final-prices',
            'services.ruguex_prices.cache_minutes' => 15,
        ]);

        Http::fake(
            function (Request $request) {
                parse_str(
                    (string) parse_url(
                        $request->url(),
                        PHP_URL_QUERY
                    ),
                    $query
                );

                $ids = collect(
                    explode(
                        ',',
                        (string) (
                            $query['ids']
                            ?? ''
                        )
                    )
                )
                    ->filter()
                    ->map(
                        fn ($id) => (int) $id
                    );

                return Http::response([
                    'products' => $ids->map(
                        fn ($id) => [
                            'id' => $id,
                            'price_mxn_with_iva' => (float) $id,
                            'price_mxn_with_iva_formatted' => 'LIVE-'.$id,
                        ]
                    )
                        ->values()
                        ->all(),
                ], 200);
            }
        );

        $items =
            $this->catalogItems();

        $this->assertCount(
            12,
            $items
        );

        $this->assertCount(
            12,
            collect($items)
                ->pluck('product_id')
                ->unique()
        );

        foreach ($items as $item) {
            $this->assertSame(
                'LIVE-'.$item['product_id'],
                $item['price']
            );

            $this->assertSame(
                'woocommerce_api',
                $item['price_source']
            );
        }
    }

    public function test_catalog_fails_safe_without_reusing_static_prices(): void
    {
        Cache::flush();

        config([
            'services.ruguex_prices.endpoint' => 'https://prices.test/final-prices',
            'services.ruguex_prices.cache_minutes' => 15,
        ]);

        Http::fake([
            '*' => Http::response(
                [],
                503
            ),
        ]);

        $items =
            $this->catalogItems();

        $this->assertCount(
            12,
            $items
        );

        foreach ($items as $item) {
            $this->assertSame(
                'Consultar precio',
                $item['price']
            );

            $this->assertSame(
                'unavailable',
                $item['price_source']
            );
        }
    }

    private function catalogItems(): array
    {
        $controller =
            app(
                PageController::class
            );

        $reflection =
            new ReflectionClass(
                $controller
            );

        $method =
            $reflection->getMethod(
                'minicargadorCatalog'
            );

        $method->setAccessible(
            true
        );

        $catalog =
            $method->invoke(
                $controller
            );

        return collect(
            $catalog
        )
            ->flatMap(
                fn ($measurements) => collect(
                    $measurements
                )->flatMap(
                    fn ($items) => collect($items)
                )
            )
            ->values()
            ->all();
    }
}
