<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'contact_info', 'notes', 'product_id'];

    protected $searchableFields = ['*'];
}
