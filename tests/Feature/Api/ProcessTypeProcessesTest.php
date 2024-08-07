<?php

namespace Tests\Feature\Api;

use App\Models\Process;
use App\Models\ProcessType;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessTypeProcessesTest extends TestCase
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
    public function it_gets_process_type_processes(): void
    {
        $processType = ProcessType::factory()->create();
        $processes = Process::factory()
            ->count(2)
            ->create([
                'process_type_id' => $processType->id,
            ]);

        $response = $this->getJson(
            route('api.process-types.processes.index', $processType)
        );

        $response->assertOk()->assertSee($processes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_process_type_processes(): void
    {
        $processType = ProcessType::factory()->create();
        $data = Process::factory()
            ->make([
                'process_type_id' => $processType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.process-types.processes.store', $processType),
            $data
        );

        $this->assertDatabaseHas('processes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $process = Process::latest('id')->first();

        $this->assertEquals($processType->id, $process->process_type_id);
    }
}
