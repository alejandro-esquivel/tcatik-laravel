<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake('es_ES')->words(fake()->numberBetween(1, 5), true),
            'precio' => fake()->randomFloat(2, 0, 3519.99),
            'observaciones' => fake('es_ES')->sentence(4),
        ];
    }
}

