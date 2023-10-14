<?php

namespace App\Http\Controllers\Api;

use App\Models\BlogTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogTagResource;
use App\Http\Resources\BlogTagCollection;
use App\Http\Requests\BlogTagStoreRequest;
use App\Http\Requests\BlogTagUpdateRequest;

class BlogTagController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BlogTag::class);

        $search = $request->get('search', '');

        $blogTags = BlogTag::search($search)
            ->latest()
            ->paginate();

        return new BlogTagCollection($blogTags);
    }

    /**
     * @param \App\Http\Requests\BlogTagStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogTagStoreRequest $request)
    {
        $this->authorize('create', BlogTag::class);

        $validated = $request->validated();

        $blogTag = BlogTag::create($validated);

        return new BlogTagResource($blogTag);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogTag $blogTag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogTag $blogTag)
    {
        $this->authorize('view', $blogTag);

        return new BlogTagResource($blogTag);
    }

    /**
     * @param \App\Http\Requests\BlogTagUpdateRequest $request
     * @param \App\Models\BlogTag $blogTag
     * @return \Illuminate\Http\Response
     */
    public function update(BlogTagUpdateRequest $request, BlogTag $blogTag)
    {
        $this->authorize('update', $blogTag);

        $validated = $request->validated();

        $blogTag->update($validated);

        return new BlogTagResource($blogTag);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogTag $blogTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BlogTag $blogTag)
    {
        $this->authorize('delete', $blogTag);

        $blogTag->delete();

        return response()->noContent();
    }
}
