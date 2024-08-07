<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'      => $this->faker->sentence(10),
            'text'       => $this->faker->text(),
            'created_by' => $this->faker->text(255),
            'ad_type_id' => \App\Models\AdType::factory(),
        ];
    }
}
