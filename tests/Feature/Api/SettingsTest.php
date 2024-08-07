<?php

namespace Tests\Feature\Api;

use App\Models\Settings;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_all_settings_list(): void
    {
        $allSettings = Settings::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-settings.index'));

        $response->assertOk()->assertSee($allSettings[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_settings(): void
    {
        $data = Settings::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-settings.store'), $data);

        $this->assertDatabaseHas('settings', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_settings(): void
    {
        $settings = Settings::factory()->create();

        $data = [
            'name'         => $this->faker->name(),
            'group'        => $this->faker->text(255),
            'value'        => $this->faker->text(),
            'description'  => $this->faker->sentence(15),
            'type'         => $this->faker->word(),
            'display_name' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.all-settings.update', $settings),
            $data
        );

        $data['id'] = $settings->id;

        $this->assertDatabaseHas('settings', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_settings(): void
    {
        $settings = Settings::factory()->create();

        $response = $this->deleteJson(
            route('api.all-settings.destroy', $settings)
        );

        $this->assertSoftDeleted($settings);

        $response->assertNoContent();
    }
}
