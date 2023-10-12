<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carousel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['image', 'name', 'overlay_text'];

    protected $searchableFields = ['*'];
}
