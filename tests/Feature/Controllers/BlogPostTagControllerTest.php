<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BlogPostTag;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogPostTagControllerTest extends TestCase
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

    /**
     * @test
     */
    public function it_displays_index_view_with_blog_post_tags()
    {
        $blogPostTags = BlogPostTag::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('blog-post-tags.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_post_tags.index')
            ->assertViewHas('blogPostTags');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_blog_post_tag()
    {
        $response = $this->get(route('blog-post-tags.create'));

        $response->assertOk()->assertViewIs('app.blog_post_tags.create');
    }

    /**
     * @test
     */
    public function it_stores_the_blog_post_tag()
    {
        $data = BlogPostTag::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('blog-post-tags.store'), $data);

        $this->assertDatabaseHas('blog_post_tags', $data);

        $blogPostTag = BlogPostTag::latest('id')->first();

        $response->assertRedirect(route('blog-post-tags.edit', $blogPostTag));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_blog_post_tag()
    {
        $blogPostTag = BlogPostTag::factory()->create();

        $response = $this->get(route('blog-post-tags.show', $blogPostTag));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_post_tags.show')
            ->assertViewHas('blogPostTag');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_blog_post_tag()
    {
        $blogPostTag = BlogPostTag::factory()->create();

        $response = $this->get(route('blog-post-tags.edit', $blogPostTag));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_post_tags.edit')
            ->assertViewHas('blogPostTag');
    }

    /**
     * @test
     */
    public function it_updates_the_blog_post_tag()
    {
        $blogPostTag = BlogPostTag::factory()->create();

        $data = [
            'blog_post_id' => $this->faker->randomNumber,
            'blog_tag_id' => $this->faker->randomNumber,
        ];

        $response = $this->put(
            route('blog-post-tags.update', $blogPostTag),
            $data
        );

        $data['id'] = $blogPostTag->id;

        $this->assertDatabaseHas('blog_post_tags', $data);

        $response->assertRedirect(route('blog-post-tags.edit', $blogPostTag));
    }

    /**
     * @test
     */
    public function it_deletes_the_blog_post_tag()
    {
        $blogPostTag = BlogPostTag::factory()->create();

        $response = $this->delete(
            route('blog-post-tags.destroy', $blogPostTag)
        );

        $response->assertRedirect(route('blog-post-tags.index'));

        $this->assertModelMissing($blogPostTag);
    }
}
