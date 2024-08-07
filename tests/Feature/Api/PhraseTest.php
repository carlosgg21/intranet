<?php

namespace Tests\Feature\Api;

use App\Models\Phrase;
use App\Models\PhraseCategory;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PhraseTest extends TestCase
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
    public function it_gets_phrases_list(): void
    {
        $phrases = Phrase::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.phrases.index'));

        $response->assertOk()->assertSee($phrases[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_phrase(): void
    {
        $data = Phrase::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.phrases.store'), $data);

        $this->assertDatabaseHas('phrases', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_phrase(): void
    {
        $phrase = Phrase::factory()->create();

        $phraseCategory = PhraseCategory::factory()->create();

        $data = [
            'text'               => $this->faker->text(),
            'author'             => $this->faker->text(255),
            'phrase_category_id' => $phraseCategory->id,
        ];

        $response = $this->putJson(route('api.phrases.update', $phrase), $data);

        $data['id'] = $phrase->id;

        $this->assertDatabaseHas('phrases', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_phrase(): void
    {
        $phrase = Phrase::factory()->create();

        $response = $this->deleteJson(route('api.phrases.destroy', $phrase));

        $this->assertSoftDeleted($phrase);

        $response->assertNoContent();
    }
}
