<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'title',
        'message',
        'visibility',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'visibility' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
