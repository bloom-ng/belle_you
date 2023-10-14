<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BlogPostTag;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogPostTagTest extends TestCase
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
    public function it_gets_blog_post_tags_list()
    {
        $blogPostTags = BlogPostTag::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.blog-post-tags.index'));

        $response->assertOk()->assertSee($blogPostTags[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_blog_post_tag()
    {
        $data = BlogPostTag::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.blog-post-tags.store'), $data);

        $this->assertDatabaseHas('blog_post_tags', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.blog-post-tags.update', $blogPostTag),
            $data
        );

        $data['id'] = $blogPostTag->id;

        $this->assertDatabaseHas('blog_post_tags', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_blog_post_tag()
    {
        $blogPostTag = BlogPostTag::factory()->create();

        $response = $this->deleteJson(
            route('api.blog-post-tags.destroy', $blogPostTag)
        );

        $this->assertModelMissing($blogPostTag);

        $response->assertNoContent();
    }
}
