<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomNumber,
            'quantity' => $this->faker->randomNumber,
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'status' => 'delivered',
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
