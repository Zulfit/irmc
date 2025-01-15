<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Milestone>
 */
class MilestoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(), // Reference a valid project
            'name' => $this->faker->sentence(3), // Random milestone name
            'target_complete_date' => $this->faker->dateTimeBetween('now', '+1 year'), // Random future date
            'deliverable' => $this->faker->sentence(6), // Random deliverable description
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']), // Random status
            'remark' => $this->faker->sentence(6), // Optional remark
        ];
    }
}
