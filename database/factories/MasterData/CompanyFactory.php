<?php

namespace Database\Factories\MasterData;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'      => $this->faker->word(),
            'name'      => $this->faker->name(),
            'type'      => $this->faker->randomDigit(),
            'address'   => $this->faker->city(),
            'no_telfon' => $this->faker->randomNumber(9, true),
            'status'    => 1,
            'description' => $this->faker->sentence() 
        ];
    }
}
