<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UiSetting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['key', 'value', 'page', 'name'];

    protected $searchableFields = ['*'];

    protected $table = 'ui_settings';
}
