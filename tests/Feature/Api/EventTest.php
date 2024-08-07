<?php

namespace Tests\Feature\Api;

use App\Models\Event;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class EventTest extends TestCase
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
    public function it_gets_events_list(): void
    {
        $events = Event::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.events.index'));

        $response->assertOk()->assertSee($events[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_event(): void
    {
        $data = Event::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.events.store'), $data);

        $this->assertDatabaseHas('events', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_event(): void
    {
        $event = Event::factory()->create();

        $data = [
            'name'         => $this->faker->name(),
            'date'         => $this->faker->date(),
            'hour'         => $this->faker->text(255),
            'place'        => $this->faker->text(255),
            'description'  => $this->faker->sentence(15),
            'created_by'   => $this->faker->text(255),
            'participants' => [],
            'all_day'      => $this->faker->boolean(),
            'repeat'       => 'Evento de una sola vez',
        ];

        $response = $this->putJson(route('api.events.update', $event), $data);

        $data['id'] = $event->id;

        $this->assertDatabaseHas('events', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_event(): void
    {
        $event = Event::factory()->create();

        $response = $this->deleteJson(route('api.events.destroy', $event));

        $this->assertSoftDeleted($event);

        $response->assertNoContent();
    }
}
