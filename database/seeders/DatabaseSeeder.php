<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Client::factory(20)->has(Address::factory()->count(1), 'addresses')->create();

        \App\Models\User::factory()->create([
            'name' => 'Usuário Teste',
            'email' => 'test@example.com',
        ]);
    }
}
