<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Carousel;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarouselTest extends TestCase
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
    public function it_gets_carousels_list()
    {
        $carousels = Carousel::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.carousels.index'));

        $response->assertOk()->assertSee($carousels[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_carousel()
    {
        $data = Carousel::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.carousels.store'), $data);

        $this->assertDatabaseHas('carousels', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_carousel()
    {
        $carousel = Carousel::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'overlay_text' => $this->faker->text,
            'status' => $this->faker->word,
        ];

        $response = $this->putJson(
            route('api.carousels.update', $carousel),
            $data
        );

        $data['id'] = $carousel->id;

        $this->assertDatabaseHas('carousels', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_carousel()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->deleteJson(
            route('api.carousels.destroy', $carousel)
        );

        $this->assertDeleted($carousel);

        $response->assertNoContent();
    }
}
