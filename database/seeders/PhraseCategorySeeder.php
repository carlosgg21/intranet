<?php

namespace Database\Seeders;

use App\Models\PhraseCategory;
use Illuminate\Database\Seeder;

class PhraseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhraseCategory::factory()
            ->count(5)
            ->create();
    }
}
