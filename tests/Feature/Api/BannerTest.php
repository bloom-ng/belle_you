<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Banner;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BannerTest extends TestCase
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
    public function it_gets_banners_list()
    {
        $banners = Banner::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.banners.index'));

        $response->assertOk()->assertSee($banners[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_banner()
    {
        $data = Banner::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.banners.store'), $data);

        $this->assertDatabaseHas('banners', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_banner()
    {
        $banner = Banner::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'position' => $this->faker->text(255),
        ];

        $response = $this->putJson(route('api.banners.update', $banner), $data);

        $data['id'] = $banner->id;

        $this->assertDatabaseHas('banners', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_banner()
    {
        $banner = Banner::factory()->create();

        $response = $this->deleteJson(route('api.banners.destroy', $banner));

        $this->assertDeleted($banner);

        $response->assertNoContent();
    }
}
