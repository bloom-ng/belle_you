<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Invoice;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceControllerTest extends TestCase
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

    protected function castToJson($json)
    {
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        } elseif (is_null($json) || is_null(json_decode($json))) {
            throw new \Exception(
                'A valid JSON string was not provided for casting.'
            );
        }

        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_invoices()
    {
        $invoices = Invoice::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('invoices.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.invoices.index')
            ->assertViewHas('invoices');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_invoice()
    {
        $response = $this->get(route('invoices.create'));

        $response->assertOk()->assertViewIs('app.invoices.create');
    }

    /**
     * @test
     */
    public function it_stores_the_invoice()
    {
        $data = Invoice::factory()
            ->make()
            ->toArray();

        $data['line_items'] = json_encode($data['line_items']);

        $response = $this->post(route('invoices.store'), $data);

        $data['line_items'] = $this->castToJson($data['line_items']);

        $this->assertDatabaseHas('invoices', $data);

        $invoice = Invoice::latest('id')->first();

        $response->assertRedirect(route('invoices.edit', $invoice));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_invoice()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->get(route('invoices.show', $invoice));

        $response
            ->assertOk()
            ->assertViewIs('app.invoices.show')
            ->assertViewHas('invoice');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_invoice()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->get(route('invoices.edit', $invoice));

        $response
            ->assertOk()
            ->assertViewIs('app.invoices.edit')
            ->assertViewHas('invoice');
    }

    /**
     * @test
     */
    public function it_updates_the_invoice()
    {
        $invoice = Invoice::factory()->create();

        $user = User::factory()->create();

        $data = [
            'user_id' => $this->faker->randomNumber,
            'invoice_ref' => $this->faker->text(255),
            'line_items' => [],
            'status' => $this->faker->word,
            'user_name' => $this->faker->text(255),
            'phone' => $this->faker->phoneNumber,
            'total' => $this->faker->randomFloat(2, 0, 9999),
            'user_id' => $user->id,
        ];

        $data['line_items'] = json_encode($data['line_items']);

        $response = $this->put(route('invoices.update', $invoice), $data);

        $data['id'] = $invoice->id;

        $data['line_items'] = $this->castToJson($data['line_items']);

        $this->assertDatabaseHas('invoices', $data);

        $response->assertRedirect(route('invoices.edit', $invoice));
    }

    /**
     * @test
     */
    public function it_deletes_the_invoice()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->delete(route('invoices.destroy', $invoice));

        $response->assertRedirect(route('invoices.index'));

        $this->assertModelMissing($invoice);
    }
}
