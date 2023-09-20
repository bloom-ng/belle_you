<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
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
    }
}
