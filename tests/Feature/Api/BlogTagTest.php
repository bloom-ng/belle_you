<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BlogTag;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTagTest extends TestCase
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
    public function it_gets_blog_tags_list()
    {
        $blogTags = BlogTag::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.blog-tags.index'));

        $response->assertOk()->assertSee($blogTags[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_blog_tag()
    {
        $data = BlogTag::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.blog-tags.store'), $data);

        $this->assertDatabaseHas('blog_tags', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.blog-tags.update', $blogTag),
            $data
        );

        $data['id'] = $blogTag->id;

        $this->assertDatabaseHas('blog_tags', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_blog_tag()
    {
        $blogTag = BlogTag::factory()->create();

        $response = $this->deleteJson(route('api.blog-tags.destroy', $blogTag));

        $this->assertModelMissing($blogTag);

        $response->assertNoContent();
    }
}
