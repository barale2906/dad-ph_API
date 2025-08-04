<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Correspondencia>
 */
class CorrespondenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_recepcion' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'remitente' => $this->faker->company(),
            'destinatario' => $this->faker->name(),
            'observaciones' => $this->faker->sentence(),
            'property_id' => Property::factory(),
            'path_llega' => $this->faker->optional(0.8)->imageUrl(640, 480, 'package'),
            'path_entrega' => $this->faker->optional(0.6)->imageUrl(640, 480, 'delivery'),
        ];
    }

    /**
     * Indica que la correspondencia ya fue entregada
     */
    public function entregada(): static
    {
        return $this->state(fn (array $attributes) => [
            'path_entrega' => $this->faker->imageUrl(640, 480, 'delivery'),
        ]);
    }

    /**
     * Indica que la correspondencia tiene imagen de llegada
     */
    public function conImagenLlegada(): static
    {
        return $this->state(fn (array $attributes) => [
            'path_llega' => $this->faker->imageUrl(640, 480, 'package'),
        ]);
    }
}
