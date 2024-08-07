<?php

namespace Database\Seeders;

use App\Models\ProcessType;
use Illuminate\Database\Seeder;

class ProcessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProcessType::factory()
            ->count(5)
            ->create();
    }
}
