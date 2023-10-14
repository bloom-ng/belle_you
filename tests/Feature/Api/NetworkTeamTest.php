<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\NetworkTeam;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NetworkTeamTest extends TestCase
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
    public function it_gets_network_teams_list()
    {
        $networkTeams = NetworkTeam::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.network-teams.index'));

        $response->assertOk()->assertSee($networkTeams[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_network_team()
    {
        $data = NetworkTeam::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.network-teams.store'), $data);

        $this->assertDatabaseHas('network_teams', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.network-teams.update', $networkTeam),
            $data
        );

        $data['id'] = $networkTeam->id;

        $this->assertDatabaseHas('network_teams', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_network_team()
    {
        $networkTeam = NetworkTeam::factory()->create();

        $response = $this->deleteJson(
            route('api.network-teams.destroy', $networkTeam)
        );

        $this->assertModelMissing($networkTeam);

        $response->assertNoContent();
    }
}
