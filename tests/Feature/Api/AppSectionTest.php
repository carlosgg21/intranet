<?php

namespace Tests\Feature\Api;

use App\Models\AppSection;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AppSectionTest extends TestCase
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
    public function it_gets_app_sections_list(): void
    {
        $appSections = AppSection::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.app-sections.index'));

        $response->assertOk()->assertSee($appSections[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_app_section(): void
    {
        $data = AppSection::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.app-sections.store'), $data);

        $this->assertDatabaseHas('app_sections', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.app-sections.update', $appSection),
            $data
        );

        $data['id'] = $appSection->id;

        $this->assertDatabaseHas('app_sections', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_app_section(): void
    {
        $appSection = AppSection::factory()->create();

        $response = $this->deleteJson(
            route('api.app-sections.destroy', $appSection)
        );

        $this->assertSoftDeleted($appSection);

        $response->assertNoContent();
    }
}
