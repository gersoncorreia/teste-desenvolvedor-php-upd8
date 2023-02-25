<?php

namespace Database\Factories;

use App\Models\Client;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'cpf' => fake()->numberBetween(00000000000, 99999999999),
            'date_birth' => new CarbonImmutable(fake()->dateTimeBetween('-1 years', 'now')),
            'sex' => fake()->randomElement(['male', 'female']),
        ];
    }
}
