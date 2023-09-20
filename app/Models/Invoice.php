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
        'line_item',
        'status',
        'billed_to_line_1',
        'billed_to_line_2',
        'account_name',
        'account_number',
        'bank_name',
        'service_charge',
        'vat',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'line_item' => 'array',
    ];
}
