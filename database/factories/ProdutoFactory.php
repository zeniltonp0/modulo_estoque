<?php

namespace Database\Factories;

use App\Enums\UnidadeMedida;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isMateriaPrima = fake()->boolean(70);

        if ($isMateriaPrima) {
            $name = fake()->randomElement(['Farinha de Trigo', 'Peito de Frango', 'Cebola', 'Manteiga', 'Tomate']);
            $unit = UnidadeMedida::Grama;
            $type = 'MateriaPrima';
        } else {
            $name = fake()->randomElement(['Empada de Frango', 'Empada de Carne Seca', 'Empada de Palmito']);
            $unit = UnidadeMedida::Unidade;
            $type = 'ProdutoFinal';
        }

        return [
            'name' => $name . ' ' . fake()->unique()->word(), // Garante nomes únicos
            'unidade_medida' => $unit,
            'type' => $type,
        ];
    }
}