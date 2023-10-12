<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\StoreSetting;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreSettingControllerTest extends TestCase
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
    public function it_displays_index_view_with_store_settings()
    {
        $storeSettings = StoreSetting::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('store-settings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.store_settings.index')
            ->assertViewHas('storeSettings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_store_setting()
    {
        $response = $this->get(route('store-settings.create'));

        $response->assertOk()->assertViewIs('app.store_settings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_store_setting()
    {
        $data = StoreSetting::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('store-settings.store'), $data);

        $this->assertDatabaseHas('store_settings', $data);

        $storeSetting = StoreSetting::latest('id')->first();

        $response->assertRedirect(route('store-settings.edit', $storeSetting));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_store_setting()
    {
        $storeSetting = StoreSetting::factory()->create();

        $response = $this->get(route('store-settings.show', $storeSetting));

        $response
            ->assertOk()
            ->assertViewIs('app.store_settings.show')
            ->assertViewHas('storeSetting');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_store_setting()
    {
        $storeSetting = StoreSetting::factory()->create();

        $response = $this->get(route('store-settings.edit', $storeSetting));

        $response
            ->assertOk()
            ->assertViewIs('app.store_settings.edit')
            ->assertViewHas('storeSetting');
    }

    /**
     * @test
     */
    public function it_updates_the_store_setting()
    {
        $storeSetting = StoreSetting::factory()->create();

        $data = [
            'key' => $this->faker->text(255),
            'value' => $this->faker->text,
        ];

        $response = $this->put(
            route('store-settings.update', $storeSetting),
            $data
        );

        $data['id'] = $storeSetting->id;

        $this->assertDatabaseHas('store_settings', $data);

        $response->assertRedirect(route('store-settings.edit', $storeSetting));
    }

    /**
     * @test
     */
    public function it_deletes_the_store_setting()
    {
        $storeSetting = StoreSetting::factory()->create();

        $response = $this->delete(
            route('store-settings.destroy', $storeSetting)
        );

        $response->assertRedirect(route('store-settings.index'));

        $this->assertModelMissing($storeSetting);
    }
}
