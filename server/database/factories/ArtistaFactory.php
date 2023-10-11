<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artista>
 */
class ArtistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->words(2,true),
            'img' => 'img/covers/' . $this->faker->words(1,true) . '.jpeg',
            'descricao' => $this->faker->words(4,true)
        ];
    }
}
