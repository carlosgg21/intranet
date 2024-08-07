<?php

namespace Tests\Feature\Controllers;

use App\Models\AppSection;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppSectionControllerTest extends TestCase
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
    public function it_displays_index_view_with_app_sections(): void
    {
        $appSections = AppSection::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('app-sections.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.app_sections.index')
            ->assertViewHas('appSections');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_app_section(): void
    {
        $response = $this->get(route('app-sections.create'));

        $response->assertOk()->assertViewIs('app.app_sections.create');
    }

    /**
     * @test
     */
    public function it_stores_the_app_section(): void
    {
        $data = AppSection::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('app-sections.store'), $data);

        $this->assertDatabaseHas('app_sections', $data);

        $appSection = AppSection::latest('id')->first();

        $response->assertRedirect(route('app-sections.edit', $appSection));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_app_section(): void
    {
        $appSection = AppSection::factory()->create();

        $response = $this->get(route('app-sections.show', $appSection));

        $response
            ->assertOk()
            ->assertViewIs('app.app_sections.show')
            ->assertViewHas('appSection');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_app_section(): void
    {
        $appSection = AppSection::factory()->create();

        $response = $this->get(route('app-sections.edit', $appSection));

        $response
            ->assertOk()
            ->assertViewIs('app.app_sections.edit')
            ->assertViewHas('appSection');
    }

    /**
     * @test
     */
    public function it_updates_the_app_section(): void
    {
        $appSection = AppSection::factory()->create();

        $data = [
            'name'         => $this->faker->name(),
            'display_name' => $this->faker->text(255),
            'description'  => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('app-sections.update', $appSection),
            $data
        );

        $data['id'] = $appSection->id;

        $this->assertDatabaseHas('app_sections', $data);

        $response->assertRedirect(route('app-sections.edit', $appSection));
    }

    /**
     * @test
     */
    public function it_deletes_the_app_section(): void
    {
        $appSection = AppSection::factory()->create();

        $response = $this->delete(route('app-sections.destroy', $appSection));

        $response->assertRedirect(route('app-sections.index'));

        $this->assertSoftDeleted($appSection);
    }
}
