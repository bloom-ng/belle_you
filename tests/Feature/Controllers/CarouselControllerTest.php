<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Carousel;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarouselControllerTest extends TestCase
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
    public function it_displays_index_view_with_carousels()
    {
        $carousels = Carousel::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('carousels.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.carousels.index')
            ->assertViewHas('carousels');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_carousel()
    {
        $response = $this->get(route('carousels.create'));

        $response->assertOk()->assertViewIs('app.carousels.create');
    }

    /**
     * @test
     */
    public function it_stores_the_carousel()
    {
        $data = Carousel::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('carousels.store'), $data);

        $this->assertDatabaseHas('carousels', $data);

        $carousel = Carousel::latest('id')->first();

        $response->assertRedirect(route('carousels.edit', $carousel));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_carousel()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->get(route('carousels.show', $carousel));

        $response
            ->assertOk()
            ->assertViewIs('app.carousels.show')
            ->assertViewHas('carousel');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_carousel()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->get(route('carousels.edit', $carousel));

        $response
            ->assertOk()
            ->assertViewIs('app.carousels.edit')
            ->assertViewHas('carousel');
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

        $response = $this->put(route('carousels.update', $carousel), $data);

        $data['id'] = $carousel->id;

        $this->assertDatabaseHas('carousels', $data);

        $response->assertRedirect(route('carousels.edit', $carousel));
    }

    /**
     * @test
     */
    public function it_deletes_the_carousel()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->delete(route('carousels.destroy', $carousel));

        $response->assertRedirect(route('carousels.index'));

        $this->assertDeleted($carousel);
    }
}
