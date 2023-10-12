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
            'user_id' => 2,
            // 'name' => $this->faker->name(),
            'invoice_ref' => $this->faker->text(255),
            'line_items' => [],
            'status' => $this->faker->word,
            'user_name' => $this->faker->text(255),
            'phone' => $this->faker->phoneNumber,
            'total' => $this->faker->randomFloat(2, 0, 9999),
        ];
    }
}
