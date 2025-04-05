<?php

namespace Database\Seeders;

use App\Models\Ratings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingsFactory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ratings::factory()->count(5)->create();

    }
}
