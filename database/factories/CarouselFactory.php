<?php

namespace Database\Factories;

use App\Models\Carousel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Carousel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'overlay_text' => $this->faker->text,
            'status' => $this->faker->word,
        ];
    }
}
