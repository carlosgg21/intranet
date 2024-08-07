<?php

namespace Tests\Feature\Api;

use App\Models\Process;
use App\Models\ProcessType;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessTest extends TestCase
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
    public function it_gets_processes_list(): void
    {
        $processes = Process::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.processes.index'));

        $response->assertOk()->assertSee($processes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_process(): void
    {
        $data = Process::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.processes.store'), $data);

        $this->assertDatabaseHas('processes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_process(): void
    {
        $process = Process::factory()->create();

        $processType = ProcessType::factory()->create();

        $data = [
            'code'            => $this->faker->unique->text(255),
            'name'            => $this->faker->unique->name(),
            'description'     => $this->faker->sentence(15),
            'parent_id'       => $this->faker->randomNumber(),
            'process_type_id' => $processType->id,
        ];

        $response = $this->putJson(
            route('api.processes.update', $process),
            $data
        );

        $data['id'] = $process->id;

        $this->assertDatabaseHas('processes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_process(): void
    {
        $process = Process::factory()->create();

        $response = $this->deleteJson(route('api.processes.destroy', $process));

        $this->assertSoftDeleted($process);

        $response->assertNoContent();
    }
}
