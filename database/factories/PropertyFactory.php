<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // El campo 'tower_block' es opcional (nullable), por lo que podemos hacer que se genere aleatoriamente.
            // Usaremos una probabilidad del 80% para que se genere un valor.
            'tower_block' => $this->faker->optional(0.8)->randomElement(['Torre 1', 'Torre 2', 'Torre 3']),

            // Para 'unit_number', generamos un número de apartamento de 3 dígitos, por ejemplo, '101', '203', '504'.
            'unit_number' => $this->faker->numberBetween(1, 15) . sprintf('%02d', $this->faker->numberBetween(1, 8)),

            // El 'ownership_coefficient' es un decimal. Generamos un número flotante aleatorio
            // con 5 decimales, como se especifica en tu migración.
            'ownership_coefficient' => $this->faker->randomFloat(5, 0.005, 0.02),
        ];
    }
}
