<?php

namespace Tests\Feature\Api;

use App\Models\ProcessType;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessTypeTest extends TestCase
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
    public function it_gets_process_types_list(): void
    {
        $processTypes = ProcessType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.process-types.index'));

        $response->assertOk()->assertSee($processTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_process_type(): void
    {
        $data = ProcessType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.process-types.store'), $data);

        $this->assertDatabaseHas('process_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.process-types.update', $processType),
            $data
        );

        $data['id'] = $processType->id;

        $this->assertDatabaseHas('process_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_process_type(): void
    {
        $processType = ProcessType::factory()->create();

        $response = $this->deleteJson(
            route('api.process-types.destroy', $processType)
        );

        $this->assertSoftDeleted($processType);

        $response->assertNoContent();
    }
}
