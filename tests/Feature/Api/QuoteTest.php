<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Quote;

use App\Models\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuoteTest extends TestCase
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
    public function it_gets_quotes_list()
    {
        $quotes = Quote::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.quotes.index'));

        $response->assertOk()->assertSee($quotes[0]->phone);
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

        $product = Product::factory()->create();

        $data = [
            'product_id' => $this->faker->randomNumber,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'specification' => $this->faker->text,
            'status' => 'pending',
            'product_id' => $product->id,
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

        $this->assertModelMissing($quote);

        $response->assertNoContent();
    }
}
