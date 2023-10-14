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

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'id', 'product_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
