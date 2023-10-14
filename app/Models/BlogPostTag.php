<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPostTag extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['blog_post_id', 'blog_tag_id'];

    protected $searchableFields = ['*'];

    protected $table = 'blog_post_tags';
}
