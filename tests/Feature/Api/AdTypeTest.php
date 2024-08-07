<?php

namespace Tests\Feature\Api;

use App\Models\AdType;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AdTypeTest extends TestCase
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
    public function it_gets_ad_types_list(): void
    {
        $adTypes = AdType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.ad-types.index'));

        $response->assertOk()->assertSee($adTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_ad_type(): void
    {
        $data = AdType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.ad-types.store'), $data);

        $this->assertDatabaseHas('ad_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ad_type(): void
    {
        $adType = AdType::factory()->create();

        $data = [
            'name'        => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'icon'        => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.ad-types.update', $adType),
            $data
        );

        $data['id'] = $adType->id;

        $this->assertDatabaseHas('ad_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ad_type(): void
    {
        $adType = AdType::factory()->create();

        $response = $this->deleteJson(route('api.ad-types.destroy', $adType));

        $this->assertSoftDeleted($adType);

        $response->assertNoContent();
    }
}
