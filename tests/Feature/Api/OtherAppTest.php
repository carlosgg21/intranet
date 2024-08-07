<?php

namespace Tests\Feature\Api;

use App\Models\OtherApp;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class OtherAppTest extends TestCase
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
    public function it_gets_other_apps_list(): void
    {
        $otherApps = OtherApp::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.other-apps.index'));

        $response->assertOk()->assertSee($otherApps[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_other_app(): void
    {
        $data = OtherApp::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.other-apps.store'), $data);

        $this->assertDatabaseHas('other_apps', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.other-apps.update', $otherApp),
            $data
        );

        $data['id'] = $otherApp->id;

        $this->assertDatabaseHas('other_apps', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_other_app(): void
    {
        $otherApp = OtherApp::factory()->create();

        $response = $this->deleteJson(
            route('api.other-apps.destroy', $otherApp)
        );

        $this->assertSoftDeleted($otherApp);

        $response->assertNoContent();
    }
}
