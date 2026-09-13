<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RuguexPriceService
{
    public function applyToCatalog(array $catalog): array
    {
        $ids = [];

        $this->collectProductIds(
            $catalog,
            $ids
        );

        $prices = $this->getPricesForIds(
            $ids
        );

        return $this->applyPrices(
            $catalog,
            $prices
        );
    }

    public function getPricesForIds(array $ids): Collection
    {
        $endpoint = config(
            'services.ruguex_prices.endpoint'
        );

        if (! $endpoint || empty($ids)) {
            return collect();
        }

        $ids = collect($ids)
            ->filter()
            ->map(
                fn ($id) => (int) $id
            )
            ->filter(
                fn ($id) => $id > 0
            )
            ->unique()
            ->sort()
            ->values()
            ->all();

        if ($ids === []) {
            return collect();
        }

        $cacheMinutes = config(
            'services.ruguex_prices.cache_minutes',
            15
        );

        $cacheKey =
            'ruguex_minicargadores_prices_v1_'
            .md5(
                implode(',', $ids)
            );

        $cachedProducts = Cache::remember(
            $cacheKey,
            now()->addMinutes(
                $cacheMinutes
            ),
            function () use (
                $endpoint,
                $ids
            ) {
                $products = collect();

                foreach (
                    array_chunk(
                        $ids,
                        30
                    ) as $chunk
                ) {
                    try {
                        $response = Http::timeout(10)
                            ->get(
                                $endpoint,
                                [
                                    'ids' => implode(
                                        ',',
                                        $chunk
                                    ),
                                ]
                            );

                        if (! $response->successful()) {
                            continue;
                        }

                        $payload =
                            $response->json();

                        $products =
                            $products->merge(
                                collect(
                                    $payload[
                                        'products'
                                    ] ?? []
                                )
                            );
                    } catch (\Throwable $exception) {
                        report(
                            $exception
                        );
                    }
                }

                return $products
                    ->filter(
                        fn ($item) => is_array($item)
                            && isset(
                                $item['id']
                            )
                    )
                    ->values()
                    ->all();
            }
        );

        if (! is_array($cachedProducts)) {
            return collect();
        }

        return collect(
            $cachedProducts
        )
            ->filter(
                fn ($item) => is_array($item)
                    && isset($item['id'])
            )
            ->keyBy(
                fn ($item) => (int) $item['id']
            );
    }

    private function collectProductIds(
        array $node,
        array &$ids
    ): void {
        foreach ($node as $value) {
            if (! is_array($value)) {
                continue;
            }

            if (
                isset($value['product_id'])
                && (int) $value['product_id'] > 0
            ) {
                $ids[] =
                    (int) $value[
                        'product_id'
                    ];

                continue;
            }

            $this->collectProductIds(
                $value,
                $ids
            );
        }
    }

    private function applyPrices(
        array $node,
        Collection $prices
    ): array {
        foreach (
            $node as $key => $value
        ) {
            if (! is_array($value)) {
                continue;
            }

            if (
                isset(
                    $value['product_id']
                )
            ) {
                $live =
                    $prices->get(
                        (int) $value[
                            'product_id'
                        ]
                    );

                $value['price'] =
                    $live[
                        'price_mxn_with_iva_formatted'
                    ]
                    ?? 'Consultar precio';

                $value['price_mxn'] =
                    $live[
                        'price_mxn_with_iva'
                    ]
                    ?? null;

                $value['price_source'] =
                    $live !== null
                        ? 'woocommerce_api'
                        : 'unavailable';

                $node[$key] =
                    $value;

                continue;
            }

            $node[$key] =
                $this->applyPrices(
                    $value,
                    $prices
                );
        }

        return $node;
    }
}
