<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email'    => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(CurrencySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(TownshipSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(AdTypeSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(AppSectionSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ChargeSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(OtherAppSeeder::class);
        $this->call(PhraseSeeder::class);
        $this->call(PhraseCategorySeeder::class);
        $this->call(ProcessSeeder::class);
        $this->call(ProcessFileSeeder::class);
        $this->call(ProcessFileStatusSeeder::class);
        $this->call(ProcessTypeSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WorkGroupSeeder::class);
    }
}
