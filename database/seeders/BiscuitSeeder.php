<?php

namespace Database\Seeders;

use App\Models\Biscuit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiscuitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Biscuit::factory()->count(5)->create();
    }
}
