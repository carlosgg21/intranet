<?php

namespace Tests\Feature\Api;

use App\Models\PhraseCategory;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PhraseCategoryTest extends TestCase
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
    public function it_gets_phrase_categories_list(): void
    {
        $phraseCategories = PhraseCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.phrase-categories.index'));

        $response->assertOk()->assertSee($phraseCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_phrase_category(): void
    {
        $data = PhraseCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.phrase-categories.store'),
            $data
        );

        $this->assertDatabaseHas('phrase_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_phrase_category(): void
    {
        $phraseCategory = PhraseCategory::factory()->create();

        $data = [
            'name'        => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(
            route('api.phrase-categories.update', $phraseCategory),
            $data
        );

        $data['id'] = $phraseCategory->id;

        $this->assertDatabaseHas('phrase_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_phrase_category(): void
    {
        $phraseCategory = PhraseCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.phrase-categories.destroy', $phraseCategory)
        );

        $this->assertSoftDeleted($phraseCategory);

        $response->assertNoContent();
    }
}
