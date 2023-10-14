<?php

namespace App\Http\Controllers;

use App\Models\BlogPostTag;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.blog_post_tags.index',
            compact('blogPostTags', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BlogPostTag::class);

        return view('app.blog_post_tags.create');
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

        return redirect()
            ->route('blog-post-tags.edit', $blogPostTag)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPostTag $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogPostTag $blogPostTag)
    {
        $this->authorize('view', $blogPostTag);

        return view('app.blog_post_tags.show', compact('blogPostTag'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPostTag $blogPostTag
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BlogPostTag $blogPostTag)
    {
        $this->authorize('update', $blogPostTag);

        return view('app.blog_post_tags.edit', compact('blogPostTag'));
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

        return redirect()
            ->route('blog-post-tags.edit', $blogPostTag)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('blog-post-tags.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
