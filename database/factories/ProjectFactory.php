<?php

namespace Database\Factories;

use App\Models\Academician;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'academician_id' => Academician::inRandomOrder()->first()->id, // Random academician as leader
            'grantAmount' => $this->faker->numberBetween(1000,10000),
            'grantProvider' => $this->faker->name,
            'title' => $this->faker->sentence(3),
            'startDate' => $this->faker->dateTimeBetween('-1 year','now'),
            'duration' => $this->faker->randomDigit(),
        ];
    }
}
