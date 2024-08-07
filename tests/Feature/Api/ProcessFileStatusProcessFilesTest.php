<?php

namespace Tests\Feature\Api;

use App\Models\ProcessFile;
use App\Models\ProcessFileStatus;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessFileStatusProcessFilesTest extends TestCase
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
    public function it_gets_process_file_status_process_files(): void
    {
        $processFileStatus = ProcessFileStatus::factory()->create();
        $processFiles = ProcessFile::factory()
            ->count(2)
            ->create([
                'process_file_status_id' => $processFileStatus->id,
            ]);

        $response = $this->getJson(
            route(
                'api.process-file-statuses.process-files.index',
                $processFileStatus
            )
        );

        $response->assertOk()->assertSee($processFiles[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_process_file_status_process_files(): void
    {
        $processFileStatus = ProcessFileStatus::factory()->create();
        $data = ProcessFile::factory()
            ->make([
                'process_file_status_id' => $processFileStatus->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.process-file-statuses.process-files.store',
                $processFileStatus
            ),
            $data
        );

        unset($data['process_id']);

        $this->assertDatabaseHas('process_files', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $processFile = ProcessFile::latest('id')->first();

        $this->assertEquals(
            $processFileStatus->id,
            $processFile->process_file_status_id
        );
    }
}
