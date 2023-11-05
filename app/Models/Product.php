<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'photo',
        'price',
        'discount_type',
        'discount',
        'discount_price',
        'description',
        'category_id',
        'status',
    ];
}
