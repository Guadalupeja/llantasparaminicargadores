<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'meta_description',
        'h1',
        'intro',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}