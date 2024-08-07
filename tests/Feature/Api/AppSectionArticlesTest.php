<?php

namespace Tests\Feature\Api;

use App\Models\AppSection;
use App\Models\Article;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AppSectionArticlesTest extends TestCase
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
    public function it_gets_app_section_articles(): void
    {
        $appSection = AppSection::factory()->create();
        $articles = Article::factory()
            ->count(2)
            ->create([
                'app_section_id' => $appSection->id,
            ]);

        $response = $this->getJson(
            route('api.app-sections.articles.index', $appSection)
        );

        $response->assertOk()->assertSee($articles[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_app_section_articles(): void
    {
        $appSection = AppSection::factory()->create();
        $data = Article::factory()
            ->make([
                'app_section_id' => $appSection->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.app-sections.articles.store', $appSection),
            $data
        );

        $this->assertDatabaseHas('articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $article = Article::latest('id')->first();

        $this->assertEquals($appSection->id, $article->app_section_id);
    }
}
