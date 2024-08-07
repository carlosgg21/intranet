<?php

namespace Tests\Feature\Api;

use App\Models\Area;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AreaEmployeesTest extends TestCase
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
    public function it_gets_area_employees(): void
    {
        $area = Area::factory()->create();
        $employees = Employee::factory()
            ->count(2)
            ->create([
                'area_id' => $area->id,
            ]);

        $response = $this->getJson(route('api.areas.employees.index', $area));

        $response->assertOk()->assertSee($employees[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_area_employees(): void
    {
        $area = Area::factory()->create();
        $data = Employee::factory()
            ->make([
                'area_id' => $area->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.areas.employees.store', $area),
            $data
        );

        $this->assertDatabaseHas('employees', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $employee = Employee::latest('id')->first();

        $this->assertEquals($area->id, $employee->area_id);
    }
}
