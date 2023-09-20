<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\UiSetting;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UiSettingTest extends TestCase
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
    public function it_gets_ui_settings_list()
    {
        $uiSettings = UiSetting::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.ui-settings.index'));

        $response->assertOk()->assertSee($uiSettings[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_ui_setting()
    {
        $data = UiSetting::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.ui-settings.store'), $data);

        $this->assertDatabaseHas('ui_settings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ui_setting()
    {
        $uiSetting = UiSetting::factory()->create();

        $data = [
            'key' => $this->faker->text(255),
            'value' => $this->faker->text,
            'page' => $this->faker->text(255),
            'name' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.ui-settings.update', $uiSetting),
            $data
        );

        $data['id'] = $uiSetting->id;

        $this->assertDatabaseHas('ui_settings', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ui_setting()
    {
        $uiSetting = UiSetting::factory()->create();

        $response = $this->deleteJson(
            route('api.ui-settings.destroy', $uiSetting)
        );

        $this->assertDeleted($uiSetting);

        $response->assertNoContent();
    }
}
