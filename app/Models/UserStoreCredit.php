<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserStoreCredit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'credit'];

    protected $searchableFields = ['*'];

    protected $table = 'user_store_credits';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
