<?php

namespace Tests\Feature\Controllers;

use App\Models\AdType;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_ad_types(): void
    {
        $adTypes = AdType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('ad-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.ad_types.index')
            ->assertViewHas('adTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_ad_type(): void
    {
        $response = $this->get(route('ad-types.create'));

        $response->assertOk()->assertViewIs('app.ad_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_ad_type(): void
    {
        $data = AdType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('ad-types.store'), $data);

        $this->assertDatabaseHas('ad_types', $data);

        $adType = AdType::latest('id')->first();

        $response->assertRedirect(route('ad-types.edit', $adType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_ad_type(): void
    {
        $adType = AdType::factory()->create();

        $response = $this->get(route('ad-types.show', $adType));

        $response
            ->assertOk()
            ->assertViewIs('app.ad_types.show')
            ->assertViewHas('adType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_ad_type(): void
    {
        $adType = AdType::factory()->create();

        $response = $this->get(route('ad-types.edit', $adType));

        $response
            ->assertOk()
            ->assertViewIs('app.ad_types.edit')
            ->assertViewHas('adType');
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

        $response = $this->put(route('ad-types.update', $adType), $data);

        $data['id'] = $adType->id;

        $this->assertDatabaseHas('ad_types', $data);

        $response->assertRedirect(route('ad-types.edit', $adType));
    }

    /**
     * @test
     */
    public function it_deletes_the_ad_type(): void
    {
        $adType = AdType::factory()->create();

        $response = $this->delete(route('ad-types.destroy', $adType));

        $response->assertRedirect(route('ad-types.index'));

        $this->assertSoftDeleted($adType);
    }
}
