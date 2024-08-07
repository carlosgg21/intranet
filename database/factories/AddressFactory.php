<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address'          => $this->faker->address(),
            'zip_code'         => $this->faker->text(255),
            'default'          => $this->faker->boolean(),
            'township_id'      => \App\Models\Township::factory(),
            'city_id'          => \App\Models\City::factory(),
            'country_id'       => \App\Models\Country::factory(),
            'addressable_type' => $this->faker->randomElement([
                \App\Models\Company::class,
                \App\Models\Employee::class,
            ]),
            'addressable_id' => function (array $item) {
                return app($item['addressable_type'])->factory();
            },
        ];
    }
}
