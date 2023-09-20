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
            'name' => $this->faker->name(),
            'contact_info' => $this->faker->text(255),
            'notes' => $this->faker->text,
        ];
    }
}
