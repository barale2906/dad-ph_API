<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Censo>
 */
class CensoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo = $this->faker->numberBetween(0, 7);

        $isPersona = in_array($tipo, [0, 1, 2, 3, 7], true);

        $name = match ($tipo) {
            4 => $this->faker->firstName() . ' (Gato)',
            5 => $this->faker->firstName() . ' (Perro)',
            6 => $this->faker->word() . ' (Otra mascota)',
            default => $this->faker->name(),
        };

        return [
            'property_id' => Property::query()->inRandomOrder()->value('id') ?? Property::factory(),
            'tipo' => $tipo,
            'habitante' => $this->faker->numberBetween(0, 1),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'name' => $name,
            'observaciones' => $this->faker->sentences(2, true),
            'fecha_nacimiento' => $isPersona
                ? $this->faker->dateTimeBetween('-90 years', '-16 years')->format('Y-m-d')
                : null,
        ];
    }
}
