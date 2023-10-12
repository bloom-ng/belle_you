<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'quantity',
        'image',
        'image_2',
        'price',
        'description',
        'type',
        'short_description',
        'shipping_fee',
        'sale_price',
        'sale_start',
        'sale_end',
        'slug',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'sale_start' => 'date',
        'sale_end' => 'date',
    ];
}
