<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $fillable = [
        'name',
        'price',
        'operation_type',
        'address',
        'area',
        'rooms',
        'bathrooms',
        'images',
        'is_published',
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2',
        'is_published' => 'boolean',
    ];
}
