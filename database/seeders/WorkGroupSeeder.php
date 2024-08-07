<?php

namespace Database\Seeders;

use App\Models\WorkGroup;
use Illuminate\Database\Seeder;

class WorkGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkGroup::factory()
            ->count(5)
            ->create();
    }
}
