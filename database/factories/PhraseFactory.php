<?php

namespace Database\Factories;

use App\Models\Phrase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhraseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phrase::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text'               => $this->faker->text(),
            'author'             => $this->faker->name(),
            'phrase_category_id' => \App\Models\PhraseCategory::factory(),
        ];
    }
}
