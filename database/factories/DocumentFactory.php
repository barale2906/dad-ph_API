<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'path' => $this->faker->url(),
            'user_id' => User::factory(),
            'version' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement([0, 1, 2]),
            'vigencia_date' => $this->faker->date(),
        ];
    }
}
