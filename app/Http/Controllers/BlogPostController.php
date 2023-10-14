<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.blog_posts.index', compact('blogPosts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BlogPost::class);

        $users = User::pluck('name', 'id');
        $blogCategories = BlogCategory::pluck('name', 'id');

        return view(
            'app.blog_posts.create',
            compact('users', 'blogCategories')
        );
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

        return redirect()
            ->route('blog-posts.edit', $blogPost)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BlogPost $blogPost)
    {
        $this->authorize('view', $blogPost);

        return view('app.blog_posts.show', compact('blogPost'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BlogPost $blogPost)
    {
        $this->authorize('update', $blogPost);

        $users = User::pluck('name', 'id');
        $blogCategories = BlogCategory::pluck('name', 'id');

        return view(
            'app.blog_posts.edit',
            compact('blogPost', 'users', 'blogCategories')
        );
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

        return redirect()
            ->route('blog-posts.edit', $blogPost)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('blog-posts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
