<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\UserStoreCredit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserStoreCreditTest extends TestCase
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
    public function it_gets_user_store_credits_list()
    {
        $userStoreCredits = UserStoreCredit::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.user-store-credits.index'));

        $response->assertOk()->assertSee($userStoreCredits[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_user_store_credit()
    {
        $data = UserStoreCredit::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.user-store-credits.store'),
            $data
        );

        $this->assertDatabaseHas('user_store_credits', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_user_store_credit()
    {
        $userStoreCredit = UserStoreCredit::factory()->create();

        $user = User::factory()->create();

        $data = [
            'user_id' => $this->faker->randomNumber,
            'credit' => $this->faker->randomNumber(1),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.user-store-credits.update', $userStoreCredit),
            $data
        );

        $data['id'] = $userStoreCredit->id;

        $this->assertDatabaseHas('user_store_credits', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_user_store_credit()
    {
        $userStoreCredit = UserStoreCredit::factory()->create();

        $response = $this->deleteJson(
            route('api.user-store-credits.destroy', $userStoreCredit)
        );

        $this->assertModelMissing($userStoreCredit);

        $response->assertNoContent();
    }
}
