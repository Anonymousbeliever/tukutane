<?php

namespace Database\Seeders;

use App\Models\AlumniProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumniProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create profiles for all alumnus users
        User::where('role', 'alumnus')->each(function ($user) {
            AlumniProfile::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
