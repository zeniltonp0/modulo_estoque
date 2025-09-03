<?php

namespace App\Livewire\Stock;

use App\Livewire\Forms\Stock\ItemForm;
use App\Models\Estoque;
use App\Models\Produto;
use Livewire\Component;

class CreateItem extends Component
{
    public ItemForm $form;

    public function save()
    {
        $this->form->store();

        // Dispara um evento para o componente Index saber que precisa recarregar
        $this->dispatch('item-created');
        // Dispara um evento para o AlpineJS fechar o modal
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.stock.create-item', [
            'produtos' => Produto::orderBy('name')->get(),
            'estoques' => Estoque::orderBy('name')->get(),
        ]);
    }
}