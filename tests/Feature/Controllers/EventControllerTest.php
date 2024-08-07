<?php

namespace Tests\Feature\Controllers;

use App\Models\Event;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventControllerTest extends TestCase
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

    protected function castToJson($json)
    {
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        } elseif (is_null($json) || is_null(json_decode($json))) {
            throw new \Exception(
                'A valid JSON string was not provided for casting.'
            );
        }

        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_events(): void
    {
        $events = Event::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('events.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.events.index')
            ->assertViewHas('events');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_event(): void
    {
        $response = $this->get(route('events.create'));

        $response->assertOk()->assertViewIs('app.events.create');
    }

    /**
     * @test
     */
    public function it_stores_the_event(): void
    {
        $data = Event::factory()
            ->make()
            ->toArray();

        $data['participants'] = json_encode($data['participants']);

        $response = $this->post(route('events.store'), $data);

        $data['participants'] = $this->castToJson($data['participants']);

        $this->assertDatabaseHas('events', $data);

        $event = Event::latest('id')->first();

        $response->assertRedirect(route('events.edit', $event));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_event(): void
    {
        $event = Event::factory()->create();

        $response = $this->get(route('events.show', $event));

        $response
            ->assertOk()
            ->assertViewIs('app.events.show')
            ->assertViewHas('event');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_event(): void
    {
        $event = Event::factory()->create();

        $response = $this->get(route('events.edit', $event));

        $response
            ->assertOk()
            ->assertViewIs('app.events.edit')
            ->assertViewHas('event');
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

        $data['participants'] = json_encode($data['participants']);

        $response = $this->put(route('events.update', $event), $data);

        $data['id'] = $event->id;

        $data['participants'] = $this->castToJson($data['participants']);

        $this->assertDatabaseHas('events', $data);

        $response->assertRedirect(route('events.edit', $event));
    }

    /**
     * @test
     */
    public function it_deletes_the_event(): void
    {
        $event = Event::factory()->create();

        $response = $this->delete(route('events.destroy', $event));

        $response->assertRedirect(route('events.index'));

        $this->assertSoftDeleted($event);
    }
}
