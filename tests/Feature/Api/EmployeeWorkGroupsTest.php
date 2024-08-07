<?php

namespace Tests\Feature\Api;

use App\Models\Employee;
use App\Models\User;
use App\Models\WorkGroup;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class EmployeeWorkGroupsTest extends TestCase
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
    public function it_gets_employee_work_groups(): void
    {
        $employee = Employee::factory()->create();
        $workGroup = WorkGroup::factory()->create();

        $employee->workGroups()->attach($workGroup);

        $response = $this->getJson(
            route('api.employees.work-groups.index', $employee)
        );

        $response->assertOk()->assertSee($workGroup->name);
    }

    /**
     * @test
     */
    public function it_can_attach_work_groups_to_employee(): void
    {
        $employee = Employee::factory()->create();
        $workGroup = WorkGroup::factory()->create();

        $response = $this->postJson(
            route('api.employees.work-groups.store', [$employee, $workGroup])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $employee
                ->workGroups()
                ->where('work_groups.id', $workGroup->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_work_groups_from_employee(): void
    {
        $employee = Employee::factory()->create();
        $workGroup = WorkGroup::factory()->create();

        $response = $this->deleteJson(
            route('api.employees.work-groups.store', [$employee, $workGroup])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $employee
                ->workGroups()
                ->where('work_groups.id', $workGroup->id)
                ->exists()
        );
    }
}
