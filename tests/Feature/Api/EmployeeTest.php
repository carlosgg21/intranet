<?php

namespace Tests\Feature\Api;

use App\Models\Area;
use App\Models\Charge;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class EmployeeTest extends TestCase
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
    public function it_gets_employees_list(): void
    {
        $employees = Employee::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.employees.index'));

        $response->assertOk()->assertSee($employees[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_employee(): void
    {
        $data = Employee::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.employees.store'), $data);

        $this->assertDatabaseHas('employees', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_employee(): void
    {
        $employee = Employee::factory()->create();

        $company = Company::factory()->create();
        $charge = Charge::factory()->create();
        $area = Area::factory()->create();

        $data = [
            'identification' => $this->faker->unique->text(255),
            'name'           => $this->faker->name(),
            'last_name'      => $this->faker->lastName(),
            'phone'          => $this->faker->phoneNumber(),
            'cell_phone'     => $this->faker->text(255),
            'email'          => $this->faker->email(),
            'hiring_date'    => $this->faker->date(),
            'discharge_date' => $this->faker->date(),
            'birthday'       => $this->faker->date(),
            'observation'    => $this->faker->sentence(15),
            'code'           => $this->faker->text(255),
            'company_id'     => $company->id,
            'charge_id'      => $charge->id,
            'area_id'        => $area->id,
        ];

        $response = $this->putJson(
            route('api.employees.update', $employee),
            $data
        );

        $data['id'] = $employee->id;

        $this->assertDatabaseHas('employees', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_employee(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->deleteJson(
            route('api.employees.destroy', $employee)
        );

        $this->assertSoftDeleted($employee);

        $response->assertNoContent();
    }
}
