<?php

namespace App\Http\Controllers;

use App\Models\BlogTag;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.blog_tags.index', compact('blogTags', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BlogTag::class);

        return view('app.blog_tags.create');
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

        return redirect()
            ->route('blog-tags.edit', $blogTag)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogTag $blogTag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogTag $blogTag)
    {
        $this->authorize('view', $blogTag);

        return view('app.blog_tags.show', compact('blogTag'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogTag $blogTag
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BlogTag $blogTag)
    {
        $this->authorize('update', $blogTag);

        return view('app.blog_tags.edit', compact('blogTag'));
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

        return redirect()
            ->route('blog-tags.edit', $blogTag)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('blog-tags.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
