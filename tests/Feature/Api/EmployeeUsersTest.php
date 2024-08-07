<?php

namespace Tests\Feature\Api;

use App\Models\Employee;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class EmployeeUsersTest extends TestCase
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
    public function it_gets_employee_users(): void
    {
        $employee = Employee::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'employee_id' => $employee->id,
            ]);

        $response = $this->getJson(
            route('api.employees.users.index', $employee)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_employee_users(): void
    {
        $employee = Employee::factory()->create();
        $data = User::factory()
            ->make([
                'employee_id' => $employee->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.employees.users.store', $employee),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($employee->id, $user->employee_id);
    }
}
