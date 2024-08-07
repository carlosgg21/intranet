<?php

namespace Database\Factories;

use App\Models\AdType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'icon'        => $this->faker->text(255),
        ];
    }
}
