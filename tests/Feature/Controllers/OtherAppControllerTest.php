<?php

namespace Tests\Feature\Controllers;

use App\Models\OtherApp;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OtherAppControllerTest extends TestCase
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
    public function it_displays_index_view_with_other_apps(): void
    {
        $otherApps = OtherApp::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('other-apps.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.other_apps.index')
            ->assertViewHas('otherApps');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_other_app(): void
    {
        $response = $this->get(route('other-apps.create'));

        $response->assertOk()->assertViewIs('app.other_apps.create');
    }

    /**
     * @test
     */
    public function it_stores_the_other_app(): void
    {
        $data = OtherApp::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('other-apps.store'), $data);

        $this->assertDatabaseHas('other_apps', $data);

        $otherApp = OtherApp::latest('id')->first();

        $response->assertRedirect(route('other-apps.edit', $otherApp));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_other_app(): void
    {
        $otherApp = OtherApp::factory()->create();

        $response = $this->get(route('other-apps.show', $otherApp));

        $response
            ->assertOk()
            ->assertViewIs('app.other_apps.show')
            ->assertViewHas('otherApp');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_other_app(): void
    {
        $otherApp = OtherApp::factory()->create();

        $response = $this->get(route('other-apps.edit', $otherApp));

        $response
            ->assertOk()
            ->assertViewIs('app.other_apps.edit')
            ->assertViewHas('otherApp');
    }

    /**
     * @test
     */
    public function it_updates_the_other_app(): void
    {
        $otherApp = OtherApp::factory()->create();

        $data = [
            'name'         => $this->faker->unique->name(),
            'display_name' => $this->faker->text(255),
            'url'          => $this->faker->url(),
            'icon'         => $this->faker->text(255),
            'description'  => $this->faker->sentence(15),
            'type'         => 'site',
        ];

        $response = $this->put(route('other-apps.update', $otherApp), $data);

        $data['id'] = $otherApp->id;

        $this->assertDatabaseHas('other_apps', $data);

        $response->assertRedirect(route('other-apps.edit', $otherApp));
    }

    /**
     * @test
     */
    public function it_deletes_the_other_app(): void
    {
        $otherApp = OtherApp::factory()->create();

        $response = $this->delete(route('other-apps.destroy', $otherApp));

        $response->assertRedirect(route('other-apps.index'));

        $this->assertSoftDeleted($otherApp);
    }
}
