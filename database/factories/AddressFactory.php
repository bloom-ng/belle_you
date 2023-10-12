<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'country' => $this->faker->text(255),
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'zip_code' => $this->faker->text(255),
            'address_line_1' => $this->faker->text,
            'address_line_2' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'phone_2' => $this->faker->text(255),
        ];
    }
}
