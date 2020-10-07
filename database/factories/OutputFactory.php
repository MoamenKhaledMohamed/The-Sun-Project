<?php

namespace Database\Factories;

use App\Models\Output;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutputFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Output::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'type' => 'payment',
            'amount' => $this->faker->numberBetween(100,200),
        ];
    }
}
