<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BlogPost;

use App\Models\BlogCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogPostTest extends TestCase
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
    public function it_gets_blog_posts_list()
    {
        $blogPosts = BlogPost::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.blog-posts.index'));

        $response->assertOk()->assertSee($blogPosts[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_blog_post()
    {
        $data = BlogPost::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.blog-posts.store'), $data);

        $this->assertDatabaseHas('blog_posts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_blog_post()
    {
        $blogPost = BlogPost::factory()->create();

        $user = User::factory()->create();
        $blogCategory = BlogCategory::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'author' => $this->faker->randomNumber,
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text,
            'featured_image' => $this->faker->text(255),
            'is_featured' => $this->faker->boolean,
            'meta' => [],
            'blog_category_id' => $this->faker->randomNumber,
            'author' => $user->id,
            'blog_category_id' => $blogCategory->id,
        ];

        $response = $this->putJson(
            route('api.blog-posts.update', $blogPost),
            $data
        );

        $data['id'] = $blogPost->id;

        $this->assertDatabaseHas('blog_posts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_blog_post()
    {
        $blogPost = BlogPost::factory()->create();

        $response = $this->deleteJson(
            route('api.blog-posts.destroy', $blogPost)
        );

        $this->assertModelMissing($blogPost);

        $response->assertNoContent();
    }
}
