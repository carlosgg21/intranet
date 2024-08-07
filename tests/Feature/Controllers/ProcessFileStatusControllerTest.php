<?php

namespace Tests\Feature\Controllers;

use App\Models\ProcessFileStatus;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcessFileStatusControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_process_file_statuses(): void
    {
        $processFileStatuses = ProcessFileStatus::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('process-file-statuses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.process_file_statuses.index')
            ->assertViewHas('processFileStatuses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_process_file_status(): void
    {
        $response = $this->get(route('process-file-statuses.create'));

        $response->assertOk()->assertViewIs('app.process_file_statuses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_process_file_status(): void
    {
        $data = ProcessFileStatus::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('process-file-statuses.store'), $data);

        $this->assertDatabaseHas('process_file_statuses', $data);

        $processFileStatus = ProcessFileStatus::latest('id')->first();

        $response->assertRedirect(
            route('process-file-statuses.edit', $processFileStatus)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_process_file_status(): void
    {
        $processFileStatus = ProcessFileStatus::factory()->create();

        $response = $this->get(
            route('process-file-statuses.show', $processFileStatus)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.process_file_statuses.show')
            ->assertViewHas('processFileStatus');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_process_file_status(): void
    {
        $processFileStatus = ProcessFileStatus::factory()->create();

        $response = $this->get(
            route('process-file-statuses.edit', $processFileStatus)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.process_file_statuses.edit')
            ->assertViewHas('processFileStatus');
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

        $response = $this->put(
            route('process-file-statuses.update', $processFileStatus),
            $data
        );

        $data['id'] = $processFileStatus->id;

        $this->assertDatabaseHas('process_file_statuses', $data);

        $response->assertRedirect(
            route('process-file-statuses.edit', $processFileStatus)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_process_file_status(): void
    {
        $processFileStatus = ProcessFileStatus::factory()->create();

        $response = $this->delete(
            route('process-file-statuses.destroy', $processFileStatus)
        );

        $response->assertRedirect(route('process-file-statuses.index'));

        $this->assertSoftDeleted($processFileStatus);
    }
}
