<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identification' => $this->faker->unique()->regexify('[0-9]{11}'),
            'name'           => $this->faker->name(),
            'last_name'      => $this->faker->lastName(),
            'phone'          => $this->faker->phoneNumber(),
            'cell_phone'     => $this->faker->phoneNumber(),
            'email'          => $this->faker->email(),
            'hiring_date'    => $this->faker->date(),
            'discharge_date' => $this->faker->date(),
            'birthday'       => $this->faker->date(),
            'observation'    => $this->faker->sentence(15),
            'code'           => $this->faker->text(255),
            'company_id'     => \App\Models\Company::factory(),
            'charge_id'      => \App\Models\Charge::factory(),
            'area_id'        => \App\Models\Area::factory(),
        ];
    }
}