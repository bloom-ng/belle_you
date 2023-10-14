<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NetworkTeam extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'parent'];

    protected $searchableFields = ['*'];

    protected $table = 'network_teams';
}
