<?php

namespace Database\Factories;

use App\Models\Needy;
use Illuminate\Database\Eloquent\Factories\Factory;

class NeedyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Needy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->firstNameMale,
            'last_name' => $this->faker->firstNameMale,
            'the_cards_photo' => $this->faker->text,
            'type' => 'poor',
            'description' => $this->faker->text
        ];
    }
}
