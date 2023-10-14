<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\UserStoreCredit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserStoreCreditControllerTest extends TestCase
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
    public function it_displays_index_view_with_user_store_credits()
    {
        $userStoreCredits = UserStoreCredit::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('user-store-credits.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.user_store_credits.index')
            ->assertViewHas('userStoreCredits');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_user_store_credit()
    {
        $response = $this->get(route('user-store-credits.create'));

        $response->assertOk()->assertViewIs('app.user_store_credits.create');
    }

    /**
     * @test
     */
    public function it_stores_the_user_store_credit()
    {
        $data = UserStoreCredit::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('user-store-credits.store'), $data);

        $this->assertDatabaseHas('user_store_credits', $data);

        $userStoreCredit = UserStoreCredit::latest('id')->first();

        $response->assertRedirect(
            route('user-store-credits.edit', $userStoreCredit)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_user_store_credit()
    {
        $userStoreCredit = UserStoreCredit::factory()->create();

        $response = $this->get(
            route('user-store-credits.show', $userStoreCredit)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.user_store_credits.show')
            ->assertViewHas('userStoreCredit');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_user_store_credit()
    {
        $userStoreCredit = UserStoreCredit::factory()->create();

        $response = $this->get(
            route('user-store-credits.edit', $userStoreCredit)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.user_store_credits.edit')
            ->assertViewHas('userStoreCredit');
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

        $response = $this->put(
            route('user-store-credits.update', $userStoreCredit),
            $data
        );

        $data['id'] = $userStoreCredit->id;

        $this->assertDatabaseHas('user_store_credits', $data);

        $response->assertRedirect(
            route('user-store-credits.edit', $userStoreCredit)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_user_store_credit()
    {
        $userStoreCredit = UserStoreCredit::factory()->create();

        $response = $this->delete(
            route('user-store-credits.destroy', $userStoreCredit)
        );

        $response->assertRedirect(route('user-store-credits.index'));

        $this->assertModelMissing($userStoreCredit);
    }
}
