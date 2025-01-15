<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ];
        
        static $userCount = 3;

        // Define specific users based on count
        // if ($userCount === 0) {
        //     $userCount++;
        //     return [
        //         'name' => 'admin',
        //         'email' => 'admin@gmail.com',
        //         'role' => 'admin',
        //         'email_verified_at' => now(),
        //         'password' => static::$password ??= Hash::make('password'),
        //         'remember_token' => Str::random(10),
        //     ];
        // } elseif ($userCount <= 5) {
        //     $userCount++;
        //     return [
        //         'name' => fake()->name(),
        //         'email' => 'staff' . $userCount . '@gmail.com',
        //         'role' => 'staff',
        //         'email_verified_at' => now(),
        //         'password' => static::$password ??= Hash::make('password'),
        //         'remember_token' => Str::random(10),
        //     ];
        // } elseif ($userCount <= 11) {
            $userCount++;
            return [
                'name' => fake()->name(),
                'email' => 'user' . $userCount . '@gmail.com',
                'role' => 'academician',
                'email_verified_at' => now(),
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
            ];
        // }

        // Default fallback for additional users
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'role' => fake()->numberBetween(0, 1),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
