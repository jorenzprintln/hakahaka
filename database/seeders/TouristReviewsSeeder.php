<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; // Import the File facade

class TouristReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sqlPath = database_path('seeders/tourist_reviews.sql');

        if (File::exists($sqlPath)) {
            $sql = File::get($sqlPath);
            DB::unprepared($sql);
            $this->command->info('Tourist reviews seeded successfully!');
        } else {
            $this->command->error('Error: tourist_reviews.sql not found at ' . $sqlPath);
        }
    }
}