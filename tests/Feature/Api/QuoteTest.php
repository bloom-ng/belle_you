<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Quote;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuoteTest extends TestCase
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
    public function it_gets_quotes_list()
    {
        $quotes = Quote::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.quotes.index'));

        $response->assertOk()->assertSee($quotes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_quote()
    {
        $data = Quote::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.quotes.store'), $data);

        $this->assertDatabaseHas('quotes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_quote()
    {
        $quote = Quote::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'contact_info' => $this->faker->text(255),
            'notes' => $this->faker->text,
            'product_id' => $this->faker->randomNumber,
        ];

        $response = $this->putJson(route('api.quotes.update', $quote), $data);

        $data['id'] = $quote->id;

        $this->assertDatabaseHas('quotes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_quote()
    {
        $quote = Quote::factory()->create();

        $response = $this->deleteJson(route('api.quotes.destroy', $quote));

        $this->assertDeleted($quote);

        $response->assertNoContent();
    }
}
