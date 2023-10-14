<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ref' => $this->faker->text(255),
            'amount' => $this->faker->randomNumber(1),
            'type' => 'purchase',
            'status' => 'succcessful',
            'payment_method' => 'card',
            'id' => \App\Models\Order::factory(),
        ];
    }
}
