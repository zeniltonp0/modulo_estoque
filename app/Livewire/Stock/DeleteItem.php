<?php

namespace App\Livewire\Stock;

use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteItem extends Component
{
    public ?Item $item = null;

    #[On('delete-item')]
    public function setItem($id)
    {
        $this->item = Item::find($id);
        $this->dispatch('open-modal', name: 'delete-item');
    }

    public function delete()
    {
        if ($this->item) {
            $this->item->delete();
        }

        $this->dispatch('item-deleted');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.stock.delete-item');
    }
}