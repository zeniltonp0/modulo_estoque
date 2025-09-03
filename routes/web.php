<?php

use App\Livewire\Stock\Index as StockIndex;
use App\Livewire\Stock\SelectStock;
use Illuminate\Support\Facades\Route;

// Rota 1: Redirecionamento da Raiz para a seleção de estoque.
Route::get('/', function () {
    return redirect()->route('stock.select');
});

// Rota 2: A nova tela de seleção de estoque. (NÃO passa pelo middleware)
Route::get('/selecionar-estoque', SelectStock::class)->name('stock.select');

// Rota 3: Grupo de rotas que usa o nosso alias 'stock.selected'.
// Apenas as rotas DENTRO deste grupo serão protegidas pelo middleware.
Route::middleware(['stock.selected'])->group(function () {
    Route::get('/estoque', StockIndex::class)->name('stock.index');
});

// Rota 4: Para "sair" do estoque atual. (NÃO precisa de proteção)
Route::get('/trocar-estoque', function() {
    session()->forget('active_stock_id');
    session()->forget('active_stock_name');
    return redirect()->route('stock.select');
})->name('stock.change');