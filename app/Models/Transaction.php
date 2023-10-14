<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['ref', 'amount', 'type', 'status', 'payment_method'];

    protected $searchableFields = ['*'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'transaction_id');
    }
}
