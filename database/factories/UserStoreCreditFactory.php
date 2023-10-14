<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\UserStoreCredit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStoreCreditFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserStoreCredit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'credit' => $this->faker->randomNumber(1),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
