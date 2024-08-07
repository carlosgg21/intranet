<?php

namespace Tests\Feature\Controllers;

use App\Models\Settings;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_all_settings(): void
    {
        $allSettings = Settings::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-settings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_settings.index')
            ->assertViewHas('allSettings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_settings(): void
    {
        $response = $this->get(route('all-settings.create'));

        $response->assertOk()->assertViewIs('app.all_settings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_settings(): void
    {
        $data = Settings::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-settings.store'), $data);

        $this->assertDatabaseHas('settings', $data);

        $settings = Settings::latest('id')->first();

        $response->assertRedirect(route('all-settings.edit', $settings));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_settings(): void
    {
        $settings = Settings::factory()->create();

        $response = $this->get(route('all-settings.show', $settings));

        $response
            ->assertOk()
            ->assertViewIs('app.all_settings.show')
            ->assertViewHas('settings');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_settings(): void
    {
        $settings = Settings::factory()->create();

        $response = $this->get(route('all-settings.edit', $settings));

        $response
            ->assertOk()
            ->assertViewIs('app.all_settings.edit')
            ->assertViewHas('settings');
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

        $response = $this->put(route('all-settings.update', $settings), $data);

        $data['id'] = $settings->id;

        $this->assertDatabaseHas('settings', $data);

        $response->assertRedirect(route('all-settings.edit', $settings));
    }

    /**
     * @test
     */
    public function it_deletes_the_settings(): void
    {
        $settings = Settings::factory()->create();

        $response = $this->delete(route('all-settings.destroy', $settings));

        $response->assertRedirect(route('all-settings.index'));

        $this->assertSoftDeleted($settings);
    }
}
