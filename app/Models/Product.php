<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */

abstract class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'size', 'price', 'image', 'product_type'
    ];

    protected $casts = [
        'product_type' => 'integer',
    ];
}
