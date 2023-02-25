<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
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
            'client_id' => Client::factory(),
            'address' => fake()->text(50),
            'state' => 'SP',
            'city' => fake()->randomElement(['Campinas', 'Guarulhos', 'São Bernardo do Campo', 'Santo André']),
        ];
    }
}
