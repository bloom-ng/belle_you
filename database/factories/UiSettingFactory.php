<?php

namespace Database\Factories;

use App\Models\UiSetting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UiSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UiSetting::class;

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
            'page' => $this->faker->text(255),
            'name' => $this->faker->name(),
        ];
    }
}
