<?php

namespace Database\Seeders;

use App\Models\Academician;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Academician::factory(10)->create();

        // Project::factory(10)->create()
        // ->each(function($project){
        //     // Attach 1 to 5 random members to the project
        //     $members = Academician::inRandomOrder()->limit(rand(1, 5))->pluck('id');
        //     $project->members()->attach($members);
        // });

        // Milestone::factory(10)->create();
    }
}
