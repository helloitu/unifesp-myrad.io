<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musica>
 */
class MusicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->words(3,true),
            'autor' => $this->faker->words(4,true),
            'genero' => $this->faker->words(4,true),
            'path' => $this->faker->words(3,true),
            'duracao' => $this->faker->time(),
            'img' => $this->faker->words(5,true),
            'votos' => $this->faker->randomNumber(3)
        ];
    }
}
