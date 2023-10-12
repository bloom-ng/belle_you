<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'quantity' => $this->faker->randomNumber,
            'image' => $this->faker->text(255),
            'image_2' => $this->faker->text(255),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'description' => $this->faker->text,
            'type' => 'ready_made',
            'short_description' => $this->faker->text,
            'shipping_fee' => $this->faker->randomNumber(1),
            'sale_price' => $this->faker->randomNumber(1),
            'sale_start' => $this->faker->date,
            'sale_end' => $this->faker->date,
            'slug' => $this->faker->slug,
        ];
    }
}
