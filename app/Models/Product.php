<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
        'title',
        'meta_description',
        'h1',
        'short_description',
        'highlight_text',
        'body_intro',
        'description',
        'features',
        'applications',
        'specifications',
        'gallery',
        'hero_image',
        'brochure_url',
        'cta_primary_text',
        'cta_primary_url',
        'cta_secondary_text',
        'cta_secondary_url',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'applications' => 'array',
        'specifications' => 'array',
        'gallery' => 'array',
        'status' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
    public function getRouteKeyName(): string
{
    return 'slug';
}
}