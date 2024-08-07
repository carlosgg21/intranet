<?php

namespace Database\Factories;

use App\Models\AppSection;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AppSection::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->name(),
            'display_name' => $this->faker->text(255),
            'description'  => $this->faker->sentence(15),
        ];
    }
}
