<?php

namespace Database\Seeders;

use App\Models\AdType;
use Illuminate\Database\Seeder;

class AdTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdType::factory()
            ->count(5)
            ->create();
    }
}
