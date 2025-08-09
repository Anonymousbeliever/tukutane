<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AlumniProfileSeeder::class,
            EventSeeder::class,
            // PaymentSeeder::class, // Payments will be created via M-Pesa or manually
        ]);
    }
}
