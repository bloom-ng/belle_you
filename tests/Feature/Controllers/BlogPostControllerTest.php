<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BlogPost;

use App\Models\BlogCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogPostControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    protected function castToJson($json)
    {
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        } elseif (is_null($json) || is_null(json_decode($json))) {
            throw new \Exception(
                'A valid JSON string was not provided for casting.'
            );
        }

        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_blog_posts()
    {
        $blogPosts = BlogPost::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('blog-posts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_posts.index')
            ->assertViewHas('blogPosts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_blog_post()
    {
        $response = $this->get(route('blog-posts.create'));

        $response->assertOk()->assertViewIs('app.blog_posts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_blog_post()
    {
        $data = BlogPost::factory()
            ->make()
            ->toArray();

        $data['meta'] = json_encode($data['meta']);

        $response = $this->post(route('blog-posts.store'), $data);

        $data['meta'] = $this->castToJson($data['meta']);

        $this->assertDatabaseHas('blog_posts', $data);

        $blogPost = BlogPost::latest('id')->first();

        $response->assertRedirect(route('blog-posts.edit', $blogPost));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_blog_post()
    {
        $blogPost = BlogPost::factory()->create();

        $response = $this->get(route('blog-posts.show', $blogPost));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_posts.show')
            ->assertViewHas('blogPost');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_blog_post()
    {
        $blogPost = BlogPost::factory()->create();

        $response = $this->get(route('blog-posts.edit', $blogPost));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_posts.edit')
            ->assertViewHas('blogPost');
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

        $data['meta'] = json_encode($data['meta']);

        $response = $this->put(route('blog-posts.update', $blogPost), $data);

        $data['id'] = $blogPost->id;

        $data['meta'] = $this->castToJson($data['meta']);

        $this->assertDatabaseHas('blog_posts', $data);

        $response->assertRedirect(route('blog-posts.edit', $blogPost));
    }

    /**
     * @test
     */
    public function it_deletes_the_blog_post()
    {
        $blogPost = BlogPost::factory()->create();

        $response = $this->delete(route('blog-posts.destroy', $blogPost));

        $response->assertRedirect(route('blog-posts.index'));

        $this->assertModelMissing($blogPost);
    }
}
