<?php

namespace Database\Seeders;

use App\Models\Baker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Baker::factory()->count(5)->create();

    }
}
