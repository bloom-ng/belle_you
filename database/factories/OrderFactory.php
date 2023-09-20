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
            'name' => $this->faker->name(),
            'payment_ref' => $this->faker->text(255),
            'transacton_id' => $this->faker->text(255),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'discount' => $this->faker->randomFloat(2, 0, 9999),
            'payment_status' => $this->faker->numberBetween(0, 127),
            'payment_response' => $this->faker->text,
            'order_status' => $this->faker->numberBetween(0, 127),
            'shipping_total' => $this->faker->randomNumber(1),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
