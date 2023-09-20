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
            'name' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber(0),
            'image' => $this->faker->text(255),
            'image_2' => $this->faker->text(255),
            'price' => $this->faker->randomNumber(1),
            'description' => $this->faker->text,
            'type' => $this->faker->numberBetween(0, 127),
            'short_description' => $this->faker->text,
            'sale_price' => $this->faker->randomNumber(1),
            'sale_start' => $this->faker->date,
            'sale_end' => $this->faker->date,
            'shipping_fee' => $this->faker->randomNumber(1),
            'slug' => $this->faker->slug,
        ];
    }
}
