<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'specification' => $this->faker->text,
            'status' => 'pending',
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
