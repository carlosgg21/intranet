<?php

namespace Tests\Feature\Controllers;

use App\Models\PhraseCategory;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhraseCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_phrase_categories(): void
    {
        $phraseCategories = PhraseCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('phrase-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.phrase_categories.index')
            ->assertViewHas('phraseCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_phrase_category(): void
    {
        $response = $this->get(route('phrase-categories.create'));

        $response->assertOk()->assertViewIs('app.phrase_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_phrase_category(): void
    {
        $data = PhraseCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('phrase-categories.store'), $data);

        $this->assertDatabaseHas('phrase_categories', $data);

        $phraseCategory = PhraseCategory::latest('id')->first();

        $response->assertRedirect(
            route('phrase-categories.edit', $phraseCategory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_phrase_category(): void
    {
        $phraseCategory = PhraseCategory::factory()->create();

        $response = $this->get(
            route('phrase-categories.show', $phraseCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.phrase_categories.show')
            ->assertViewHas('phraseCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_phrase_category(): void
    {
        $phraseCategory = PhraseCategory::factory()->create();

        $response = $this->get(
            route('phrase-categories.edit', $phraseCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.phrase_categories.edit')
            ->assertViewHas('phraseCategory');
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

        $response = $this->put(
            route('phrase-categories.update', $phraseCategory),
            $data
        );

        $data['id'] = $phraseCategory->id;

        $this->assertDatabaseHas('phrase_categories', $data);

        $response->assertRedirect(
            route('phrase-categories.edit', $phraseCategory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_phrase_category(): void
    {
        $phraseCategory = PhraseCategory::factory()->create();

        $response = $this->delete(
            route('phrase-categories.destroy', $phraseCategory)
        );

        $response->assertRedirect(route('phrase-categories.index'));

        $this->assertSoftDeleted($phraseCategory);
    }
}
