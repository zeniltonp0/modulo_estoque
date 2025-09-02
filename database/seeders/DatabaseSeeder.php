<?php

namespace Database\Seeders;

use App\Enums\UnidadeMedida;
use App\Models\Estoque;
use App\Models\Item;
use App\Models\Produto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Estoque::factory()->create(['name' => 'Estoque Principal']);
        Estoque::factory()->create(['name' => 'Geladeira']);
        Estoque::factory()->create(['name' => 'Congelador']);


        Produto::factory()->create(['name' => 'Farinha de Trigo Especial', 'unidade_medida' => UnidadeMedida::Grama, 'type' => 'MateriaPrima']);
        Produto::factory()->create(['name' => 'Peito de Frango Sadia', 'unidade_medida' => UnidadeMedida::Grama, 'type' => 'MateriaPrima']);
        Produto::factory()->create(['name' => 'Manteiga com Sal Aviação', 'unidade_medida' => UnidadeMedida::Grama, 'type' => 'MateriaPrima']);
        Produto::factory()->create(['name' => 'Cebola Branca', 'unidade_medida' => UnidadeMedida::Grama, 'type' => 'MateriaPrima']);


        Produto::factory()->create(['name' => 'Empada de Frango Congelada', 'unidade_medida' => UnidadeMedida::Unidade, 'type' => 'ProdutoFinal']);
        Produto::factory()->create(['name' => 'Empada de Carne Seca Congelada', 'unidade_medida' => UnidadeMedida::Unidade, 'type' => 'ProdutoFinal']);

        Item::factory(50)->create();
    }
}