<?php

namespace Tests\Feature\Controllers;

use App\Models\Phrase;
use App\Models\PhraseCategory;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhraseControllerTest extends TestCase
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
    public function it_displays_index_view_with_phrases(): void
    {
        $phrases = Phrase::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('phrases.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.phrases.index')
            ->assertViewHas('phrases');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_phrase(): void
    {
        $response = $this->get(route('phrases.create'));

        $response->assertOk()->assertViewIs('app.phrases.create');
    }

    /**
     * @test
     */
    public function it_stores_the_phrase(): void
    {
        $data = Phrase::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('phrases.store'), $data);

        $this->assertDatabaseHas('phrases', $data);

        $phrase = Phrase::latest('id')->first();

        $response->assertRedirect(route('phrases.edit', $phrase));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_phrase(): void
    {
        $phrase = Phrase::factory()->create();

        $response = $this->get(route('phrases.show', $phrase));

        $response
            ->assertOk()
            ->assertViewIs('app.phrases.show')
            ->assertViewHas('phrase');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_phrase(): void
    {
        $phrase = Phrase::factory()->create();

        $response = $this->get(route('phrases.edit', $phrase));

        $response
            ->assertOk()
            ->assertViewIs('app.phrases.edit')
            ->assertViewHas('phrase');
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

        $response = $this->put(route('phrases.update', $phrase), $data);

        $data['id'] = $phrase->id;

        $this->assertDatabaseHas('phrases', $data);

        $response->assertRedirect(route('phrases.edit', $phrase));
    }

    /**
     * @test
     */
    public function it_deletes_the_phrase(): void
    {
        $phrase = Phrase::factory()->create();

        $response = $this->delete(route('phrases.destroy', $phrase));

        $response->assertRedirect(route('phrases.index'));

        $this->assertSoftDeleted($phrase);
    }
}
