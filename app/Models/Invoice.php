<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'invoice_ref',
        'line_items',
        'status',
        'user_name',
        'phone',
        'total',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'line_items' => 'array',
    ];
}
