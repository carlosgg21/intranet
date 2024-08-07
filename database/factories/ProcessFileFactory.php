<?php

namespace Database\Factories;

use App\Models\ProcessFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessFileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProcessFile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code'                   => $this->faker->text(255),
            'title'                  => $this->faker->name(),
            'description'            => $this->faker->sentence(15),
            'created_date'           => $this->faker->date(),
            'created_by'             => $this->faker->text(255),
            'reviewed_by'            => $this->faker->text(255),
            'appoved_by'             => $this->faker->text(255),
            'approval_date'          => $this->faker->date(),
            'process_id'             => \App\Models\Process::factory(),
            'process_file_status_id' => \App\Models\ProcessFileStatus::factory(),
        ];
    }
}
