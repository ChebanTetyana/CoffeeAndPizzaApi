<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Product
{
    use HasFactory;

    protected $table = 'menu_items';

    protected $fillable = [
        'name', 'description', 'size', 'price', 'image', 'product_type'
    ];
}
