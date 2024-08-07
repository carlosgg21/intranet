<?php

namespace Tests\Feature\Api;

use App\Models\Phrase;
use App\Models\PhraseCategory;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PhraseCategoryPhrasesTest extends TestCase
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
    public function it_gets_phrase_category_phrases(): void
    {
        $phraseCategory = PhraseCategory::factory()->create();
        $phrases = Phrase::factory()
            ->count(2)
            ->create([
                'phrase_category_id' => $phraseCategory->id,
            ]);

        $response = $this->getJson(
            route('api.phrase-categories.phrases.index', $phraseCategory)
        );

        $response->assertOk()->assertSee($phrases[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_phrase_category_phrases(): void
    {
        $phraseCategory = PhraseCategory::factory()->create();
        $data = Phrase::factory()
            ->make([
                'phrase_category_id' => $phraseCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.phrase-categories.phrases.store', $phraseCategory),
            $data
        );

        $this->assertDatabaseHas('phrases', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $phrase = Phrase::latest('id')->first();

        $this->assertEquals($phraseCategory->id, $phrase->phrase_category_id);
    }
}
