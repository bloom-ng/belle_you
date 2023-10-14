<?php

namespace Database\Factories;

use App\Models\NetworkTeam;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NetworkTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NetworkTeam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber,
            'parent' => $this->faker->randomNumber,
        ];
    }
}
