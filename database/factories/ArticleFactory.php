<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'          => $this->faker->sentence(10),
            'text'           => $this->faker->text(),
            'position'       => $this->faker->randomNumber(0),
            'created_by'     => $this->faker->text(255),
            'date'           => $this->faker->date(),
            'app_section_id' => \App\Models\AppSection::factory(),
        ];
    }
}
