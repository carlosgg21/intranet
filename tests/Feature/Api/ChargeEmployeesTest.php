<?php

namespace Tests\Feature\Api;

use App\Models\Charge;
use App\Models\Employee;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ChargeEmployeesTest extends TestCase
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
    public function it_gets_charge_employees(): void
    {
        $charge = Charge::factory()->create();
        $employees = Employee::factory()
            ->count(2)
            ->create([
                'charge_id' => $charge->id,
            ]);

        $response = $this->getJson(
            route('api.charges.employees.index', $charge)
        );

        $response->assertOk()->assertSee($employees[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_charge_employees(): void
    {
        $charge = Charge::factory()->create();
        $data = Employee::factory()
            ->make([
                'charge_id' => $charge->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.charges.employees.store', $charge),
            $data
        );

        $this->assertDatabaseHas('employees', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $employee = Employee::latest('id')->first();

        $this->assertEquals($charge->id, $employee->charge_id);
    }
}
