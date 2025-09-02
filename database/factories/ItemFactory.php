<?php

namespace Database\Factories;

use App\Enums\UnidadeMedida;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $produto = Produto::all()->random();
        $estoque = Estoque::all()->random();

        $initialQty = ($produto->unidade_medida === UnidadeMedida::Unidade)
            ? fake()->numberBetween(20, 100)
            : fake()->numberBetween(500, 5000);

        $currentQty = fake()->randomFloat(2, 0, $initialQty);

        return [
            'produto_id' => $produto->id,
            'estoque_id' => $estoque->id,
            'quantidade_inicial' => $initialQty,
            'quantidade_atual' => $currentQty,
            'status' => fake()->randomElement(['FECHADO', 'ABERTO', 'ESGOTADO']),
            'data_entrada' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}