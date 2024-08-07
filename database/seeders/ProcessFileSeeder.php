<?php

namespace Database\Seeders;

use App\Models\ProcessFile;
use Illuminate\Database\Seeder;

class ProcessFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProcessFile::factory()
            ->count(5)
            ->create();
    }
}
