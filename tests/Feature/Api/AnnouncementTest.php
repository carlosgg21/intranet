<?php

namespace Tests\Feature\Api;

use App\Models\AdType;
use App\Models\Announcement;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AnnouncementTest extends TestCase
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
    public function it_gets_announcements_list(): void
    {
        $announcements = Announcement::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.announcements.index'));

        $response->assertOk()->assertSee($announcements[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_announcement(): void
    {
        $data = Announcement::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.announcements.store'), $data);

        $this->assertDatabaseHas('announcements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_announcement(): void
    {
        $announcement = Announcement::factory()->create();

        $adType = AdType::factory()->create();

        $data = [
            'title'      => $this->faker->sentence(10),
            'text'       => $this->faker->text(),
            'created_by' => $this->faker->text(255),
            'ad_type_id' => $adType->id,
        ];

        $response = $this->putJson(
            route('api.announcements.update', $announcement),
            $data
        );

        $data['id'] = $announcement->id;

        $this->assertDatabaseHas('announcements', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_announcement(): void
    {
        $announcement = Announcement::factory()->create();

        $response = $this->deleteJson(
            route('api.announcements.destroy', $announcement)
        );

        $this->assertSoftDeleted($announcement);

        $response->assertNoContent();
    }
}
