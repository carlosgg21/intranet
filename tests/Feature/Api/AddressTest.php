<?php

namespace Tests\Feature\Api;

use App\Models\Address;
use App\Models\City;

use App\Models\Country;
use App\Models\Township;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AddressTest extends TestCase
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
    public function it_gets_addresses_list(): void
    {
        $addresses = Address::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.addresses.index'));

        $response->assertOk()->assertSee($addresses[0]->address);
    }

    /**
     * @test
     */
    public function it_stores_the_address(): void
    {
        $data = Address::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.addresses.store'), $data);

        $this->assertDatabaseHas('addresses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_address(): void
    {
        $address = Address::factory()->create();

        $township = Township::factory()->create();
        $city = City::factory()->create();
        $country = Country::factory()->create();

        $data = [
            'address'     => $this->faker->address(),
            'zip_code'    => $this->faker->text(255),
            'default'     => $this->faker->boolean(),
            'township_id' => $township->id,
            'city_id'     => $city->id,
            'country_id'  => $country->id,
        ];

        $response = $this->putJson(
            route('api.addresses.update', $address),
            $data
        );

        $data['id'] = $address->id;

        $this->assertDatabaseHas('addresses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_address(): void
    {
        $address = Address::factory()->create();

        $response = $this->deleteJson(route('api.addresses.destroy', $address));

        $this->assertSoftDeleted($address);

        $response->assertNoContent();
    }
}
