<?php

namespace Database\Seeders;

use App\Models\OtherApp;
use Illuminate\Database\Seeder;

class OtherAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OtherApp::factory()
            ->count(5)
            ->create();
    }
}
