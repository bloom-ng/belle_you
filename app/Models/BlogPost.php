<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'author',
        'description',
        'content',
        'featured_image',
        'is_featured',
        'meta',
        'blog_category_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'blog_posts';

    protected $casts = [
        'is_featured' => 'boolean',
        'meta' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
