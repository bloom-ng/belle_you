<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\StoreSetting;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreSettingTest extends TestCase
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
    public function it_gets_store_settings_list()
    {
        $storeSettings = StoreSetting::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.store-settings.index'));

        $response->assertOk()->assertSee($storeSettings[0]->key);
    }

    /**
     * @test
     */
    public function it_stores_the_store_setting()
    {
        $data = StoreSetting::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.store-settings.store'), $data);

        $this->assertDatabaseHas('store_settings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.store-settings.update', $storeSetting),
            $data
        );

        $data['id'] = $storeSetting->id;

        $this->assertDatabaseHas('store_settings', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_store_setting()
    {
        $storeSetting = StoreSetting::factory()->create();

        $response = $this->deleteJson(
            route('api.store-settings.destroy', $storeSetting)
        );

        $this->assertDeleted($storeSetting);

        $response->assertNoContent();
    }
}
