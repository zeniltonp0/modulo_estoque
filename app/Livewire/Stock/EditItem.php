<?php

namespace App\Livewire\Stock;

use App\Livewire\Forms\Stock\ItemForm;
use App\Models\Estoque;
use App\Models\Item;
use App\Models\Produto;
use Livewire\Attributes\On;
use Livewire\Component;

class EditItem extends Component
{
    public ItemForm $form;

    #[On('edit-item')]
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $this->form->setItem($item);
        $this->dispatch('open-modal', name: 'edit-item');
    }

    public function update()
    {
        $this->form->update();
        $this->dispatch('item-updated');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.stock.edit-item', [
            'produtos' => Produto::orderBy('name')->get(),
            'estoques' => Estoque::orderBy('name')->get(),
        ]);
    }
}