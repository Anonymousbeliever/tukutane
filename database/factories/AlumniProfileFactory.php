<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlumniProfile>
 */
class AlumniProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Will be overridden by seeder
            'phone_number' => fake()->phoneNumber(),
            'bio' => fake()->paragraph(),
            'profile_photo_path' => null, // Can be set later if needed
            'linkedin_url' => fake()->url(),
            'github_url' => fake()->url(),
            'current_company' => fake()->company(),
            'job_title' => fake()->jobTitle(),
        ];
    }
}
