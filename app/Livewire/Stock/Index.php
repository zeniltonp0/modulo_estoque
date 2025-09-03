<?php

namespace App\Livewire\Stock;

use App\Models\Item;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Controle de Estoque')]
#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    #[Url(as: 'status')] // Mantém o filtro na URL (ex: /estoque?status=ABERTO)
    public string $statusFilter = '';

    // Sintaxe do Livewire v3 para escutar eventos
    #[On('item-created')]
    #[On('item-updated')]
    #[On('item-deleted')]
    public function refreshList()
    {
        // Apenas reseta a paginação e força a re-renderização
        $this->resetPage();
    }

    public function render()
{
    $activeStockId = session('active_stock_id');

    $items = Item::with(['produto', 'estoque'])
        ->where('estoque_id', $activeStockId) // <-- MUDANÇA CRUCIAL AQUI!
        ->when($this->statusFilter, function ($query) {
            $query->where('status', $this->statusFilter)
                ->whereHas('produto', function ($subQuery) {
                    $subQuery->where('type', 'MateriaPrima');
                });
        })
        ->latest('data_entrada')
        ->paginate(10);

    return view('livewire.stock.index', [
        'items' => $items,
    ]);
}

}