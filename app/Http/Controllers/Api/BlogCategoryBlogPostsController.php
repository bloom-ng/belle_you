<?php

namespace App\Http\Controllers\Api;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use App\Http\Resources\BlogPostCollection;

class BlogCategoryBlogPostsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, BlogCategory $blogCategory)
    {
        $this->authorize('view', $blogCategory);

        $search = $request->get('search', '');

        $blogPosts = $blogCategory
            ->blogPosts()
            ->search($search)
            ->latest()
            ->paginate();

        return new BlogPostCollection($blogPosts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, BlogCategory $blogCategory)
    {
        $this->authorize('create', BlogPost::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'author' => ['required', 'exists:users,id'],
            'description' => ['required', 'max:255', 'string'],
            'content' => ['required', 'max:255', 'string'],
            'featured_image' => ['required', 'max:255', 'string'],
            'is_featured' => ['required', 'boolean'],
            'meta' => ['required', 'max:255', 'json'],
        ]);

        $blogPost = $blogCategory->blogPosts()->create($validated);

        return new BlogPostResource($blogPost);
    }
}
