<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'date' => $this->faker->dateTimeBetween('-60 days', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 45, 60),
            'calories' => $this->faker->numberBetween(1200, 2500),
            'exercise_time' => $this->faker->time('H:i:s'),
            'exercise_content' => $this->faker->sentence(5),
        ];
    }
}
