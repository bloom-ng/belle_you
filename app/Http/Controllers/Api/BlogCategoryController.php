<?php

namespace App\Http\Controllers\Api;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\BlogCategoryCollection;
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
            ->paginate();

        return new BlogCategoryCollection($blogCategories);
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

        return new BlogCategoryResource($blogCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogCategory $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogCategory $blogCategory)
    {
        $this->authorize('view', $blogCategory);

        return new BlogCategoryResource($blogCategory);
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

        return new BlogCategoryResource($blogCategory);
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

        return response()->noContent();
    }
}
