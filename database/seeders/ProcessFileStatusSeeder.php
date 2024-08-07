<?php

namespace Database\Seeders;

use App\Models\ProcessFileStatus;
use Illuminate\Database\Seeder;

class ProcessFileStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProcessFileStatus::factory()
            ->count(5)
            ->create();
    }
}
