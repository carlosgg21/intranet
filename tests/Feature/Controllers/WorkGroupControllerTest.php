<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\WorkGroup;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WorkGroupControllerTest extends TestCase
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
    public function it_displays_index_view_with_work_groups(): void
    {
        $workGroups = WorkGroup::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('work-groups.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.work_groups.index')
            ->assertViewHas('workGroups');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_work_group(): void
    {
        $response = $this->get(route('work-groups.create'));

        $response->assertOk()->assertViewIs('app.work_groups.create');
    }

    /**
     * @test
     */
    public function it_stores_the_work_group(): void
    {
        $data = WorkGroup::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('work-groups.store'), $data);

        $this->assertDatabaseHas('work_groups', $data);

        $workGroup = WorkGroup::latest('id')->first();

        $response->assertRedirect(route('work-groups.edit', $workGroup));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_work_group(): void
    {
        $workGroup = WorkGroup::factory()->create();

        $response = $this->get(route('work-groups.show', $workGroup));

        $response
            ->assertOk()
            ->assertViewIs('app.work_groups.show')
            ->assertViewHas('workGroup');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_work_group(): void
    {
        $workGroup = WorkGroup::factory()->create();

        $response = $this->get(route('work-groups.edit', $workGroup));

        $response
            ->assertOk()
            ->assertViewIs('app.work_groups.edit')
            ->assertViewHas('workGroup');
    }

    /**
     * @test
     */
    public function it_updates_the_work_group(): void
    {
        $workGroup = WorkGroup::factory()->create();

        $data = [
            'name'        => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(route('work-groups.update', $workGroup), $data);

        $data['id'] = $workGroup->id;

        $this->assertDatabaseHas('work_groups', $data);

        $response->assertRedirect(route('work-groups.edit', $workGroup));
    }

    /**
     * @test
     */
    public function it_deletes_the_work_group(): void
    {
        $workGroup = WorkGroup::factory()->create();

        $response = $this->delete(route('work-groups.destroy', $workGroup));

        $response->assertRedirect(route('work-groups.index'));

        $this->assertSoftDeleted($workGroup);
    }
}
