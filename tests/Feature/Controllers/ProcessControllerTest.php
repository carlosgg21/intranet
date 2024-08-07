<?php

namespace Tests\Feature\Controllers;

use App\Models\Process;
use App\Models\ProcessType;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcessControllerTest extends TestCase
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
    public function it_displays_index_view_with_processes(): void
    {
        $processes = Process::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('processes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.processes.index')
            ->assertViewHas('processes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_process(): void
    {
        $response = $this->get(route('processes.create'));

        $response->assertOk()->assertViewIs('app.processes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_process(): void
    {
        $data = Process::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('processes.store'), $data);

        $this->assertDatabaseHas('processes', $data);

        $process = Process::latest('id')->first();

        $response->assertRedirect(route('processes.edit', $process));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_process(): void
    {
        $process = Process::factory()->create();

        $response = $this->get(route('processes.show', $process));

        $response
            ->assertOk()
            ->assertViewIs('app.processes.show')
            ->assertViewHas('process');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_process(): void
    {
        $process = Process::factory()->create();

        $response = $this->get(route('processes.edit', $process));

        $response
            ->assertOk()
            ->assertViewIs('app.processes.edit')
            ->assertViewHas('process');
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

        $response = $this->put(route('processes.update', $process), $data);

        $data['id'] = $process->id;

        $this->assertDatabaseHas('processes', $data);

        $response->assertRedirect(route('processes.edit', $process));
    }

    /**
     * @test
     */
    public function it_deletes_the_process(): void
    {
        $process = Process::factory()->create();

        $response = $this->delete(route('processes.destroy', $process));

        $response->assertRedirect(route('processes.index'));

        $this->assertSoftDeleted($process);
    }
}
