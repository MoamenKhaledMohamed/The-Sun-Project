<?php

namespace Database\Factories;

use App\Models\Donor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    // fill the table by fake data using the package is called faker
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->firstNameMale,
            'last_name' => $this->faker->firstNameMale,
            'email' => $this->faker->safeEmail,
        ];
    }

    //fun to create female names
    public function changeFirstName(){

        return $this->state(function (array $attributes) {
            return [
                'first_name' => $this->faker->firstNameFemale,
            ];
        });

    }
}
