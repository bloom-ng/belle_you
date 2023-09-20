<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Invoice;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
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
    public function it_gets_invoices_list()
    {
        $invoices = Invoice::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.invoices.index'));

        $response->assertOk()->assertSee($invoices[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_invoice()
    {
        $data = Invoice::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.invoices.store'), $data);

        $this->assertDatabaseHas('invoices', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_invoice()
    {
        $invoice = Invoice::factory()->create();

        $data = [
            'line_item' => [],
            'status' => $this->faker->word,
            'billed_to_line_1' => $this->faker->text(255),
            'billed_to_line_2' => $this->faker->phoneNumber,
            'account_name' => $this->faker->text(255),
            'account_number' => $this->faker->randomNumber,
            'bank_name' => $this->faker->text(255),
            'service_charge' => $this->faker->randomNumber(1),
            'vat' => $this->faker->randomNumber(1),
        ];

        $response = $this->putJson(
            route('api.invoices.update', $invoice),
            $data
        );

        $data['id'] = $invoice->id;

        $this->assertDatabaseHas('invoices', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_invoice()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->deleteJson(route('api.invoices.destroy', $invoice));

        $this->assertDeleted($invoice);

        $response->assertNoContent();
    }
}
