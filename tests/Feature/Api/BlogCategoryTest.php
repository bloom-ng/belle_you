<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\BlogCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogCategoryTest extends TestCase
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
    public function it_gets_blog_categories_list()
    {
        $blogCategories = BlogCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.blog-categories.index'));

        $response->assertOk()->assertSee($blogCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_blog_category()
    {
        $data = BlogCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.blog-categories.store'), $data);

        $this->assertDatabaseHas('blog_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_blog_category()
    {
        $blogCategory = BlogCategory::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(
            route('api.blog-categories.update', $blogCategory),
            $data
        );

        $data['id'] = $blogCategory->id;

        $this->assertDatabaseHas('blog_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_blog_category()
    {
        $blogCategory = BlogCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.blog-categories.destroy', $blogCategory)
        );

        $this->assertModelMissing($blogCategory);

        $response->assertNoContent();
    }
}
