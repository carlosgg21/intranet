<?php

namespace Tests\Feature\Controllers;

use App\Models\ProcessType;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcessTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_process_types(): void
    {
        $processTypes = ProcessType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('process-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.process_types.index')
            ->assertViewHas('processTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_process_type(): void
    {
        $response = $this->get(route('process-types.create'));

        $response->assertOk()->assertViewIs('app.process_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_process_type(): void
    {
        $data = ProcessType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('process-types.store'), $data);

        $this->assertDatabaseHas('process_types', $data);

        $processType = ProcessType::latest('id')->first();

        $response->assertRedirect(route('process-types.edit', $processType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_process_type(): void
    {
        $processType = ProcessType::factory()->create();

        $response = $this->get(route('process-types.show', $processType));

        $response
            ->assertOk()
            ->assertViewIs('app.process_types.show')
            ->assertViewHas('processType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_process_type(): void
    {
        $processType = ProcessType::factory()->create();

        $response = $this->get(route('process-types.edit', $processType));

        $response
            ->assertOk()
            ->assertViewIs('app.process_types.edit')
            ->assertViewHas('processType');
    }

    /**
     * @test
     */
    public function it_updates_the_process_type(): void
    {
        $processType = ProcessType::factory()->create();

        $data = [
            'name'        => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('process-types.update', $processType),
            $data
        );

        $data['id'] = $processType->id;

        $this->assertDatabaseHas('process_types', $data);

        $response->assertRedirect(route('process-types.edit', $processType));
    }

    /**
     * @test
     */
    public function it_deletes_the_process_type(): void
    {
        $processType = ProcessType::factory()->create();

        $response = $this->delete(route('process-types.destroy', $processType));

        $response->assertRedirect(route('process-types.index'));

        $this->assertSoftDeleted($processType);
    }
}
