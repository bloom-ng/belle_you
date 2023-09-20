<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'country',
        'state',
        'city',
        'zip_code',
        'address_line_1',
        'address_line_2',
        'phone',
        'phone_2',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
