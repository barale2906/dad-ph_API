<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Document;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 1. Crear un usuario Administrador
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'role' => 'admin',
        ]);

        // 2. Crear un usuario Residente
        User::factory()->create([
            'name' => 'Resident User',
            'email' => 'resident@test.com',
            'role' => 'residente',
        ]);

        // 3. Crear algunas propiedades
        Property::factory()->count(10)->create();

        // 4. Crear algunos documentos
        Document::factory()->count(10)->create();
    }
}
