<?php

namespace Tests\Feature\Api;

use App\Models\ProcessFileStatus;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessFileStatusTest extends TestCase
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
    public function it_gets_process_file_statuses_list(): void
    {
        $processFileStatuses = ProcessFileStatus::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.process-file-statuses.index'));

        $response->assertOk()->assertSee($processFileStatuses[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_process_file_status(): void
    {
        $data = ProcessFileStatus::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.process-file-statuses.store'),
            $data
        );

        $this->assertDatabaseHas('process_file_statuses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_process_file_status(): void
    {
        $processFileStatus = ProcessFileStatus::factory()->create();

        $data = [
            'name'        => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(
            route('api.process-file-statuses.update', $processFileStatus),
            $data
        );

        $data['id'] = $processFileStatus->id;

        $this->assertDatabaseHas('process_file_statuses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_process_file_status(): void
    {
        $processFileStatus = ProcessFileStatus::factory()->create();

        $response = $this->deleteJson(
            route('api.process-file-statuses.destroy', $processFileStatus)
        );

        $this->assertSoftDeleted($processFileStatus);

        $response->assertNoContent();
    }
}
