<?php

namespace Database\Seeders;

use App\Models\AppSection;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AppSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AppSection::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $now = Carbon::now();

        $appSection = [
            [
                'name'         => 'historia',
                'display_name' => 'Historia',
                'description'  => 'Historia de la insitución',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'mision',
                'display_name' => 'Misión',
                'description'  => 'Misión de la insitución',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'vision',
                'display_name' => 'Visión',
                'description'  => 'Visión de la insitución',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'valores',
                'display_name' => 'Valores',
                'description'  => 'Valores de la insitución',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'objetivos',
                'display_name' => 'Objetivos',
                'description'  => 'Objetivos de la insitución',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
          

        ];

        DB::table('app_sections')->insert($appSection);

    }
}
