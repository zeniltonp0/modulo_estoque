<?php

namespace App\Livewire\Forms\Stock;

use App\Models\Item;
use Livewire\Form;

class ItemForm extends Form
{
    public ?Item $item;

    // A propriedade 'estoque_id' foi removida daqui.

    public $produto_id = '';
    public $quantidade_inicial = '';
    public $quantidade_atual = '';
    public $status = 'FECHADO';

    /**
     * Preenche o formulário com os dados de um item existente para edição.
     */
    public function setItem(Item $item)
    {
        $this->item = $item;
        $this->produto_id = $item->produto_id;
        // Não precisamos mais do 'estoque_id' no formulário.
        $this->quantidade_inicial = $item->quantidade_inicial;
        $this->quantidade_atual = $item->quantidade_atual;
        $this->status = $item->status;
    }

    /**
     * Valida os dados e cria um novo item no banco.
     */
    public function store()
    {
        // Valida apenas os campos que vêm do formulário.
        $validated = $this->validate([
            'produto_id' => 'required|exists:produtos,_id',
            'quantidade_inicial' => 'required|numeric|min:0',
            'status' => 'required|in:FECHADO,ABERTO,ESGOTADO',
        ]);

        // Adiciona os dados que são definidos pelo sistema.
        $validated['estoque_id'] = session('active_stock_id'); // Pega o estoque ativo da sessão.
        $validated['quantidade_atual'] = $this->quantidade_inicial; // Qtd. atual é igual à inicial no cadastro.
        $validated['data_entrada'] = now();

        Item::create($validated);

        $this->reset();
    }

    /**
     * Valida os dados e atualiza um item existente.
     */
    public function update()
    {
        // A regra 'lte' (menor ou igual a) garante que a quantidade atual não pode ser maior que a inicial.
        $validated = $this->validate([
            'produto_id' => 'required|exists:produtos,_id',
            'quantidade_inicial' => 'required|numeric|min:0',
            'quantidade_atual' => 'required|numeric|min:0|lte:quantidade_inicial',
            'status' => 'required|in:FECHADO,ABERTO,ESGOTADO',
        ]);

        // Atualiza o item apenas com os dados validados do formulário.
        // O 'estoque_id' não está aqui, então ele não será alterado.
        $this->item->update($validated);

        $this->reset();
    }
}