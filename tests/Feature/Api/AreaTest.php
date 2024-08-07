<?php

namespace Tests\Feature\Api;

use App\Models\Area;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AreaTest extends TestCase
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
    public function it_gets_areas_list(): void
    {
        $areas = Area::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.areas.index'));

        $response->assertOk()->assertSee($areas[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_area(): void
    {
        $data = Area::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.areas.store'), $data);

        $this->assertDatabaseHas('areas', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_area(): void
    {
        $area = Area::factory()->create();

        $data = [
            'name'        => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(route('api.areas.update', $area), $data);

        $data['id'] = $area->id;

        $this->assertDatabaseHas('areas', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_area(): void
    {
        $area = Area::factory()->create();

        $response = $this->deleteJson(route('api.areas.destroy', $area));

        $this->assertSoftDeleted($area);

        $response->assertNoContent();
    }
}
