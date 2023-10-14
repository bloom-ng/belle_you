<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryStoreRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;

class BlogCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BlogCategory::class);

        $search = $request->get('search', '');

        $blogCategories = BlogCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.blog_categories.index',
            compact('blogCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BlogCategory::class);

        return view('app.blog_categories.create');
    }

    /**
     * @param \App\Http\Requests\BlogCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryStoreRequest $request)
    {
        $this->authorize('create', BlogCategory::class);

        $validated = $request->validated();

        $blogCategory = BlogCategory::create($validated);

        return redirect()
            ->route('blog-categories.edit', $blogCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogCategory $blogCategory)
    {
        $this->authorize('view', $blogCategory);

        return view('app.blog_categories.show', compact('blogCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BlogCategory $blogCategory)
    {
        $this->authorize('update', $blogCategory);

        return view('app.blog_categories.edit', compact('blogCategory'));
    }

    /**
     * @param \App\Http\Requests\BlogCategoryUpdateRequest $request
     * @param \App\Models\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        BlogCategoryUpdateRequest $request,
        BlogCategory $blogCategory
    ) {
        $this->authorize('update', $blogCategory);

        $validated = $request->validated();

        $blogCategory->update($validated);

        return redirect()
            ->route('blog-categories.edit', $blogCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BlogCategory $blogCategory)
    {
        $this->authorize('delete', $blogCategory);

        $blogCategory->delete();

        return redirect()
            ->route('blog-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
