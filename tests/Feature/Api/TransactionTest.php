<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Transaction;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
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
    public function it_gets_transactions_list()
    {
        $transactions = Transaction::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.transactions.index'));

        $response->assertOk()->assertSee($transactions[0]->ref);
    }

    /**
     * @test
     */
    public function it_stores_the_transaction()
    {
        $data = Transaction::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.transactions.store'), $data);

        unset($data['payment_method']);

        $this->assertDatabaseHas('transactions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_transaction()
    {
        $transaction = Transaction::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'ref' => $this->faker->text(255),
            'amount' => $this->faker->randomNumber(1),
            'type' => 'purchase',
            'status' => 'succcessful',
            'payment_method' => 'card',
            'id' => $order->id,
        ];

        $response = $this->putJson(
            route('api.transactions.update', $transaction),
            $data
        );

        unset($data['payment_method']);

        $data['id'] = $transaction->id;

        $this->assertDatabaseHas('transactions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_transaction()
    {
        $transaction = Transaction::factory()->create();

        $response = $this->deleteJson(
            route('api.transactions.destroy', $transaction)
        );

        $this->assertModelMissing($transaction);

        $response->assertNoContent();
    }
}
