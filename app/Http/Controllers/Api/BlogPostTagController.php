<?php

namespace App\Http\Controllers\Api;

use App\Models\BlogPostTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostTagResource;
use App\Http\Resources\BlogPostTagCollection;
use App\Http\Requests\BlogPostTagStoreRequest;
use App\Http\Requests\BlogPostTagUpdateRequest;

class BlogPostTagController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BlogPostTag::class);

        $search = $request->get('search', '');

        $blogPostTags = BlogPostTag::search($search)
            ->latest()
            ->paginate();

        return new BlogPostTagCollection($blogPostTags);
    }

    /**
     * @param \App\Http\Requests\BlogPostTagStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostTagStoreRequest $request)
    {
        $this->authorize('create', BlogPostTag::class);

        $validated = $request->validated();

        $blogPostTag = BlogPostTag::create($validated);

        return new BlogPostTagResource($blogPostTag);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPostTag $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogPostTag $blogPostTag)
    {
        $this->authorize('view', $blogPostTag);

        return new BlogPostTagResource($blogPostTag);
    }

    /**
     * @param \App\Http\Requests\BlogPostTagUpdateRequest $request
     * @param \App\Models\BlogPostTag $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function update(
        BlogPostTagUpdateRequest $request,
        BlogPostTag $blogPostTag
    ) {
        $this->authorize('update', $blogPostTag);

        $validated = $request->validated();

        $blogPostTag->update($validated);

        return new BlogPostTagResource($blogPostTag);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPostTag $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BlogPostTag $blogPostTag)
    {
        $this->authorize('delete', $blogPostTag);

        $blogPostTag->delete();

        return response()->noContent();
    }
}
