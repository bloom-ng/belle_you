<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\BlogCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogCategoryBlogPostsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_blog_category_blog_posts()
    {
        $blogCategory = BlogCategory::factory()->create();
        $blogPosts = BlogPost::factory()
            ->count(2)
            ->create([
                'blog_category_id' => $blogCategory->id,
            ]);

        $response = $this->getJson(
            route('api.blog-categories.blog-posts.index', $blogCategory)
        );

        $response->assertOk()->assertSee($blogPosts[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_blog_category_blog_posts()
    {
        $blogCategory = BlogCategory::factory()->create();
        $data = BlogPost::factory()
            ->make([
                'blog_category_id' => $blogCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.blog-categories.blog-posts.store', $blogCategory),
            $data
        );

        $this->assertDatabaseHas('blog_posts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $blogPost = BlogPost::latest('id')->first();

        $this->assertEquals($blogCategory->id, $blogPost->blog_category_id);
    }
}
