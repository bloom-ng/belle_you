<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['product_id', 'category_id'];

    protected $searchableFields = ['*'];

    protected $table = 'product_categories';
}
