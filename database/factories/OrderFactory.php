<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id' => $this->faker->randomNumber,
            'name' => $this->faker->name(),
            'payment_ref' => $this->faker->text(255),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'discount' => $this->faker->randomFloat(2, 0, 9999),
            'payments_status' => 'successful',
            'payment_response' => $this->faker->text,
            'shipping_total' => $this->faker->randomNumber(1),
            'status' => 'completed',
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
