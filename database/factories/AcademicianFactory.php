<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Academician>
 */
class AcademicianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $counter = 4;

        return [
            'user_id' => $counter+1,
            'staff_number' => 'UNI'.$this->faker->numberBetween(1000,9999),
            'college' => $this->faker->randomElement([
                'College of Computing and Informatics',
                'College of Engineering',
                'College of Business and Accounting',
                'College of Energy Economics and Social Sciences'
            ]),
            'department' => $this->faker->randomElement([
                'Software Engineering',
                'Cyber Security',
                'Finance',
                'Mechanical Engineering',
                'Human Resource Management',
            ]),
            'position' => $this->faker->randomElement([
                'Professor',
                'Assoc Prof',
                'Senior Lecturer',
                'Lecturer',
            ]),
        ];
    }
}
