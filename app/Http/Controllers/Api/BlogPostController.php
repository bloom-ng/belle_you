<?php

namespace App\Http\Controllers\Api;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use App\Http\Resources\BlogPostCollection;
use App\Http\Requests\BlogPostStoreRequest;
use App\Http\Requests\BlogPostUpdateRequest;

class BlogPostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BlogPost::class);

        $search = $request->get('search', '');

        $blogPosts = BlogPost::search($search)
            ->latest()
            ->paginate();

        return new BlogPostCollection($blogPosts);
    }

    /**
     * @param \App\Http\Requests\BlogPostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostStoreRequest $request)
    {
        $this->authorize('create', BlogPost::class);

        $validated = $request->validated();
        $validated['meta'] = json_decode($validated['meta'], true);

        $blogPost = BlogPost::create($validated);

        return new BlogPostResource($blogPost);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogPost $blogPost)
    {
        $this->authorize('view', $blogPost);

        return new BlogPostResource($blogPost);
    }

    /**
     * @param \App\Http\Requests\BlogPostUpdateRequest $request
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, BlogPost $blogPost)
    {
        $this->authorize('update', $blogPost);

        $validated = $request->validated();

        $validated['meta'] = json_decode($validated['meta'], true);

        $blogPost->update($validated);

        return new BlogPostResource($blogPost);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BlogPost $blogPost)
    {
        $this->authorize('delete', $blogPost);

        $blogPost->delete();

        return response()->noContent();
    }
}
