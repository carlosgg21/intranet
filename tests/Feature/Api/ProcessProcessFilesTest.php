<?php

namespace Tests\Feature\Api;

use App\Models\Process;
use App\Models\ProcessFile;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessProcessFilesTest extends TestCase
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
    public function it_gets_process_process_files(): void
    {
        $process = Process::factory()->create();
        $processFiles = ProcessFile::factory()
            ->count(2)
            ->create([
                'process_id' => $process->id,
            ]);

        $response = $this->getJson(
            route('api.processes.process-files.index', $process)
        );

        $response->assertOk()->assertSee($processFiles[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_process_process_files(): void
    {
        $process = Process::factory()->create();
        $data = ProcessFile::factory()
            ->make([
                'process_id' => $process->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.processes.process-files.store', $process),
            $data
        );

        unset($data['process_id']);

        $this->assertDatabaseHas('process_files', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $processFile = ProcessFile::latest('id')->first();

        $this->assertEquals($process->id, $processFile->process_id);
    }
}
