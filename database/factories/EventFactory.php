<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->name(),
            'date'         => $this->faker->date(),
            'hour'         => $this->faker->text(255),
            'place'        => $this->faker->text(255),
            'description'  => $this->faker->sentence(15),
            'created_by'   => $this->faker->text(255),
            'participants' => [],
            'all_day'      => $this->faker->boolean(),
            'repeat'       => 'Evento de una sola vez',
        ];
    }
}
