<?php

namespace Database\Factories;

use App\Models\OtherApp;
use Illuminate\Database\Eloquent\Factories\Factory;

class OtherAppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OtherApp::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->unique->name(),
            'display_name' => $this->faker->text(255),
            'url'          => $this->faker->url(),
            'icon'         => $this->faker->text(255),
            'description'  => $this->faker->sentence(15),
            'type'         => 'site',
        ];
    }
}
