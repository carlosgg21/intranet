<?php

namespace Tests\Feature\Api;

use App\Models\Area;
use App\Models\Process;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AreaProcessesTest extends TestCase
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
    public function it_gets_area_processes(): void
    {
        $area = Area::factory()->create();
        $process = Process::factory()->create();

        $area->processes()->attach($process);

        $response = $this->getJson(route('api.areas.processes.index', $area));

        $response->assertOk()->assertSee($process->name);
    }

    /**
     * @test
     */
    public function it_can_attach_processes_to_area(): void
    {
        $area = Area::factory()->create();
        $process = Process::factory()->create();

        $response = $this->postJson(
            route('api.areas.processes.store', [$area, $process])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $area
                ->processes()
                ->where('processes.id', $process->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_processes_from_area(): void
    {
        $area = Area::factory()->create();
        $process = Process::factory()->create();

        $response = $this->deleteJson(
            route('api.areas.processes.store', [$area, $process])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $area
                ->processes()
                ->where('processes.id', $process->id)
                ->exists()
        );
    }
}
