<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\NetworkTeam;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NetworkTeamControllerTest extends TestCase
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
    public function it_displays_index_view_with_network_teams()
    {
        $networkTeams = NetworkTeam::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('network-teams.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.network_teams.index')
            ->assertViewHas('networkTeams');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_network_team()
    {
        $response = $this->get(route('network-teams.create'));

        $response->assertOk()->assertViewIs('app.network_teams.create');
    }

    /**
     * @test
     */
    public function it_stores_the_network_team()
    {
        $data = NetworkTeam::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('network-teams.store'), $data);

        $this->assertDatabaseHas('network_teams', $data);

        $networkTeam = NetworkTeam::latest('id')->first();

        $response->assertRedirect(route('network-teams.edit', $networkTeam));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_network_team()
    {
        $networkTeam = NetworkTeam::factory()->create();

        $response = $this->get(route('network-teams.show', $networkTeam));

        $response
            ->assertOk()
            ->assertViewIs('app.network_teams.show')
            ->assertViewHas('networkTeam');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_network_team()
    {
        $networkTeam = NetworkTeam::factory()->create();

        $response = $this->get(route('network-teams.edit', $networkTeam));

        $response
            ->assertOk()
            ->assertViewIs('app.network_teams.edit')
            ->assertViewHas('networkTeam');
    }

    /**
     * @test
     */
    public function it_updates_the_network_team()
    {
        $networkTeam = NetworkTeam::factory()->create();

        $data = [
            'user_id' => $this->faker->randomNumber,
            'parent' => $this->faker->randomNumber,
        ];

        $response = $this->put(
            route('network-teams.update', $networkTeam),
            $data
        );

        $data['id'] = $networkTeam->id;

        $this->assertDatabaseHas('network_teams', $data);

        $response->assertRedirect(route('network-teams.edit', $networkTeam));
    }

    /**
     * @test
     */
    public function it_deletes_the_network_team()
    {
        $networkTeam = NetworkTeam::factory()->create();

        $response = $this->delete(route('network-teams.destroy', $networkTeam));

        $response->assertRedirect(route('network-teams.index'));

        $this->assertModelMissing($networkTeam);
    }
}
