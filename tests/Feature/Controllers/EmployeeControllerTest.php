<?php

namespace Tests\Feature\Controllers;

use App\Models\Area;
use App\Models\Charge;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
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
    public function it_displays_index_view_with_employees(): void
    {
        $employees = Employee::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('employees.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.employees.index')
            ->assertViewHas('employees');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_employee(): void
    {
        $response = $this->get(route('employees.create'));

        $response->assertOk()->assertViewIs('app.employees.create');
    }

    /**
     * @test
     */
    public function it_stores_the_employee(): void
    {
        $data = Employee::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('employees.store'), $data);

        $this->assertDatabaseHas('employees', $data);

        $employee = Employee::latest('id')->first();

        $response->assertRedirect(route('employees.edit', $employee));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_employee(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.show', $employee));

        $response
            ->assertOk()
            ->assertViewIs('app.employees.show')
            ->assertViewHas('employee');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_employee(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.edit', $employee));

        $response
            ->assertOk()
            ->assertViewIs('app.employees.edit')
            ->assertViewHas('employee');
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

        $response = $this->put(route('employees.update', $employee), $data);

        $data['id'] = $employee->id;

        $this->assertDatabaseHas('employees', $data);

        $response->assertRedirect(route('employees.edit', $employee));
    }

    /**
     * @test
     */
    public function it_deletes_the_employee(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->delete(route('employees.destroy', $employee));

        $response->assertRedirect(route('employees.index'));

        $this->assertSoftDeleted($employee);
    }
}
