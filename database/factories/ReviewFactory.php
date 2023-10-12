<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'product_id' => $this->faker->randomNumber,
            'rating' => $this->faker->numberBetween(0, 127),
            'title' => $this->faker->sentence(10),
            'message' => $this->faker->sentence(20),
            'visibility' => $this->faker->boolean,
        ];
    }
}
