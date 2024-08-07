<?php

namespace Tests\Feature\Api;

use App\Models\Employee;
use App\Models\User;
use App\Models\WorkGroup;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class WorkGroupEmployeesTest extends TestCase
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
    public function it_gets_work_group_employees(): void
    {
        $workGroup = WorkGroup::factory()->create();
        $employee = Employee::factory()->create();

        $workGroup->employees()->attach($employee);

        $response = $this->getJson(
            route('api.work-groups.employees.index', $workGroup)
        );

        $response->assertOk()->assertSee($employee->name);
    }

    /**
     * @test
     */
    public function it_can_attach_employees_to_work_group(): void
    {
        $workGroup = WorkGroup::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->postJson(
            route('api.work-groups.employees.store', [$workGroup, $employee])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $workGroup
                ->employees()
                ->where('employees.id', $employee->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_employees_from_work_group(): void
    {
        $workGroup = WorkGroup::factory()->create();
        $employee = Employee::factory()->create();

        $response = $this->deleteJson(
            route('api.work-groups.employees.store', [$workGroup, $employee])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $workGroup
                ->employees()
                ->where('employees.id', $employee->id)
                ->exists()
        );
    }
}
