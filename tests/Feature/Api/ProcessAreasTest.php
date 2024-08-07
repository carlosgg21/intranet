<?php

namespace Tests\Feature\Api;

use App\Models\Area;
use App\Models\Process;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessAreasTest extends TestCase
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
    public function it_gets_process_areas(): void
    {
        $process = Process::factory()->create();
        $area = Area::factory()->create();

        $process->areas()->attach($area);

        $response = $this->getJson(
            route('api.processes.areas.index', $process)
        );

        $response->assertOk()->assertSee($area->name);
    }

    /**
     * @test
     */
    public function it_can_attach_areas_to_process(): void
    {
        $process = Process::factory()->create();
        $area = Area::factory()->create();

        $response = $this->postJson(
            route('api.processes.areas.store', [$process, $area])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $process
                ->areas()
                ->where('areas.id', $area->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_areas_from_process(): void
    {
        $process = Process::factory()->create();
        $area = Area::factory()->create();

        $response = $this->deleteJson(
            route('api.processes.areas.store', [$process, $area])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $process
                ->areas()
                ->where('areas.id', $area->id)
                ->exists()
        );
    }
}
