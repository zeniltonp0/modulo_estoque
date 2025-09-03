<?php

namespace App\Livewire\Stock;

use App\Models\Estoque;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Selecionar Estoque')]
#[Layout('layouts.app')]
class SelectStock extends Component
{
    public function selectStock($estoqueId)
    {
        $estoque = Estoque::findOrFail($estoqueId);

        // Armazena o ID e o nome do estoque na sessão do usuário
        session([
            'active_stock_id' => $estoque->id,
            'active_stock_name' => $estoque->name
        ]);

        // Redireciona o usuário para a página principal do estoque
        return $this->redirectRoute('stock.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.stock.select-stock', [
            'estoques' => Estoque::orderBy('name')->get()
        ]);
    }
}