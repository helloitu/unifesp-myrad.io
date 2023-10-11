<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
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
            'celular' => $this->faker->words(4,true),
            'idade' => $this->faker->randomNumber(2),
            'email' => $this->faker->words(4,true),
            'pass' => $this->faker->words(5,true),
            'salt' => $this->faker->words(4,true),
            'votos' => $this->faker->randomNumber(1),
            'nivel' => $this->faker->randomNumber(1)
        ];
    }
}
