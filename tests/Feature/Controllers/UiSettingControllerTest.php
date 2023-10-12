<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\UiSetting;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UiSettingControllerTest extends TestCase
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
    public function it_displays_index_view_with_ui_settings()
    {
        $uiSettings = UiSetting::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('ui-settings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.ui_settings.index')
            ->assertViewHas('uiSettings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_ui_setting()
    {
        $response = $this->get(route('ui-settings.create'));

        $response->assertOk()->assertViewIs('app.ui_settings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_ui_setting()
    {
        $data = UiSetting::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('ui-settings.store'), $data);

        $this->assertDatabaseHas('ui_settings', $data);

        $uiSetting = UiSetting::latest('id')->first();

        $response->assertRedirect(route('ui-settings.edit', $uiSetting));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_ui_setting()
    {
        $uiSetting = UiSetting::factory()->create();

        $response = $this->get(route('ui-settings.show', $uiSetting));

        $response
            ->assertOk()
            ->assertViewIs('app.ui_settings.show')
            ->assertViewHas('uiSetting');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_ui_setting()
    {
        $uiSetting = UiSetting::factory()->create();

        $response = $this->get(route('ui-settings.edit', $uiSetting));

        $response
            ->assertOk()
            ->assertViewIs('app.ui_settings.edit')
            ->assertViewHas('uiSetting');
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
            'name' => $this->faker->name(),
        ];

        $response = $this->put(route('ui-settings.update', $uiSetting), $data);

        $data['id'] = $uiSetting->id;

        $this->assertDatabaseHas('ui_settings', $data);

        $response->assertRedirect(route('ui-settings.edit', $uiSetting));
    }

    /**
     * @test
     */
    public function it_deletes_the_ui_setting()
    {
        $uiSetting = UiSetting::factory()->create();

        $response = $this->delete(route('ui-settings.destroy', $uiSetting));

        $response->assertRedirect(route('ui-settings.index'));

        $this->assertModelMissing($uiSetting);
    }
}
