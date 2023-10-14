<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BlogTag;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTagControllerTest extends TestCase
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
    public function it_displays_index_view_with_blog_tags()
    {
        $blogTags = BlogTag::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('blog-tags.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_tags.index')
            ->assertViewHas('blogTags');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_blog_tag()
    {
        $response = $this->get(route('blog-tags.create'));

        $response->assertOk()->assertViewIs('app.blog_tags.create');
    }

    /**
     * @test
     */
    public function it_stores_the_blog_tag()
    {
        $data = BlogTag::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('blog-tags.store'), $data);

        $this->assertDatabaseHas('blog_tags', $data);

        $blogTag = BlogTag::latest('id')->first();

        $response->assertRedirect(route('blog-tags.edit', $blogTag));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_blog_tag()
    {
        $blogTag = BlogTag::factory()->create();

        $response = $this->get(route('blog-tags.show', $blogTag));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_tags.show')
            ->assertViewHas('blogTag');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_blog_tag()
    {
        $blogTag = BlogTag::factory()->create();

        $response = $this->get(route('blog-tags.edit', $blogTag));

        $response
            ->assertOk()
            ->assertViewIs('app.blog_tags.edit')
            ->assertViewHas('blogTag');
    }

    /**
     * @test
     */
    public function it_updates_the_blog_tag()
    {
        $blogTag = BlogTag::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->put(route('blog-tags.update', $blogTag), $data);

        $data['id'] = $blogTag->id;

        $this->assertDatabaseHas('blog_tags', $data);

        $response->assertRedirect(route('blog-tags.edit', $blogTag));
    }

    /**
     * @test
     */
    public function it_deletes_the_blog_tag()
    {
        $blogTag = BlogTag::factory()->create();

        $response = $this->delete(route('blog-tags.destroy', $blogTag));

        $response->assertRedirect(route('blog-tags.index'));

        $this->assertModelMissing($blogTag);
    }
}
