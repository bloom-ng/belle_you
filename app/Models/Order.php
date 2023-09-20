<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'name',
        'payment_ref',
        'transacton_id',
        'state',
        'country',
        'city',
        'discount',
        'payment_status',
        'payment_response',
        'order_status',
        'shipping_total',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
