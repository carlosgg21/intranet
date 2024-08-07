<?php

namespace Database\Factories;

use App\Models\Process;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Process::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code'            => $this->faker->unique->text(255),
            'name'            => $this->faker->unique->name(),
            'description'     => $this->faker->sentence(15),
            'parent_id'       => $this->faker->randomNumber(),
            'process_type_id' => \App\Models\ProcessType::factory(),
        ];
    }
}
