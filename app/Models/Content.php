<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['page', 'name', 'content_type', 'key', 'value'];

    protected $searchableFields = ['*'];
}
