<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\WorkGroup;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class WorkGroupTest extends TestCase
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
    public function it_gets_work_groups_list(): void
    {
        $workGroups = WorkGroup::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.work-groups.index'));

        $response->assertOk()->assertSee($workGroups[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_work_group(): void
    {
        $data = WorkGroup::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.work-groups.store'), $data);

        $this->assertDatabaseHas('work_groups', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.work-groups.update', $workGroup),
            $data
        );

        $data['id'] = $workGroup->id;

        $this->assertDatabaseHas('work_groups', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_work_group(): void
    {
        $workGroup = WorkGroup::factory()->create();

        $response = $this->deleteJson(
            route('api.work-groups.destroy', $workGroup)
        );

        $this->assertSoftDeleted($workGroup);

        $response->assertNoContent();
    }
}
