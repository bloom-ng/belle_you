<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Content;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_contents_list()
    {
        $contents = Content::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.contents.index'));

        $response->assertOk()->assertSee($contents[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_content()
    {
        $data = Content::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.contents.store'), $data);

        $this->assertDatabaseHas('contents', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_content()
    {
        $content = Content::factory()->create();

        $data = [
            'page' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'content_type' => $this->faker->text(255),
            'key' => $this->faker->text(255),
            'value' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.contents.update', $content),
            $data
        );

        $data['id'] = $content->id;

        $this->assertDatabaseHas('contents', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_content()
    {
        $content = Content::factory()->create();

        $response = $this->deleteJson(route('api.contents.destroy', $content));

        $this->assertDeleted($content);

        $response->assertNoContent();
    }
}
