<?php

namespace Tests\Feature\Api;

use App\Models\AdType;
use App\Models\Announcement;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AdTypeAnnouncementsTest extends TestCase
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
    public function it_gets_ad_type_announcements(): void
    {
        $adType = AdType::factory()->create();
        $announcements = Announcement::factory()
            ->count(2)
            ->create([
                'ad_type_id' => $adType->id,
            ]);

        $response = $this->getJson(
            route('api.ad-types.announcements.index', $adType)
        );

        $response->assertOk()->assertSee($announcements[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_ad_type_announcements(): void
    {
        $adType = AdType::factory()->create();
        $data = Announcement::factory()
            ->make([
                'ad_type_id' => $adType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.ad-types.announcements.store', $adType),
            $data
        );

        $this->assertDatabaseHas('announcements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $announcement = Announcement::latest('id')->first();

        $this->assertEquals($adType->id, $announcement->ad_type_id);
    }
}
