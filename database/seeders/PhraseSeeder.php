<?php

namespace Database\Seeders;

use App\Models\Phrase;
use Illuminate\Database\Seeder;

class PhraseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phrase::factory()
            ->count(5)
            ->create();
    }
}
