<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StoreSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StoreSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => $this->faker->text(255),
            'value' => $this->faker->text,
        ];
    }
}
