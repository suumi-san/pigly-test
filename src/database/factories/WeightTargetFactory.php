<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightTargetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1, // 1人目のユーザーに紐づけ
            'target_weight' => $this->faker->randomFloat(1, 45, 60),
        ];
    }
}
