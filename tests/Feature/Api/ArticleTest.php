<?php

namespace Tests\Feature\Api;

use App\Models\AppSection;
use App\Models\Article;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ArticleTest extends TestCase
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
    public function it_gets_articles_list(): void
    {
        $articles = Article::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.articles.index'));

        $response->assertOk()->assertSee($articles[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_article(): void
    {
        $data = Article::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.articles.store'), $data);

        $this->assertDatabaseHas('articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_article(): void
    {
        $article = Article::factory()->create();

        $appSection = AppSection::factory()->create();

        $data = [
            'title'          => $this->faker->sentence(10),
            'text'           => $this->faker->text(),
            'position'       => $this->faker->randomNumber(0),
            'created_by'     => $this->faker->text(255),
            'date'           => $this->faker->date(),
            'app_section_id' => $appSection->id,
        ];

        $response = $this->putJson(
            route('api.articles.update', $article),
            $data
        );

        $data['id'] = $article->id;

        $this->assertDatabaseHas('articles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_article(): void
    {
        $article = Article::factory()->create();

        $response = $this->deleteJson(route('api.articles.destroy', $article));

        $this->assertSoftDeleted($article);

        $response->assertNoContent();
    }
}
