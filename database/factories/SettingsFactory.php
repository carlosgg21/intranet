<?php

namespace Database\Factories;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Settings::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->name(),
            'group'        => $this->faker->text(255),
            'value'        => $this->faker->text(),
            'description'  => $this->faker->sentence(15),
            'type'         => $this->faker->word(),
            'display_name' => $this->faker->text(255),
        ];
    }
}
