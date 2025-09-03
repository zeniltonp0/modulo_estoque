<x-modal name="create-item" title="Adicionar Novo Item ao Estoque">
    <form wire:submit="save">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="produto_id" class="block mb-2 text-sm font-medium text-gray-900">Produto</label>
                <select wire:model="form.produto_id" id="produto_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="">Selecione um produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->name }}</option>
                    @endforeach
                </select>
                @error('form.produto_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="quantidade_inicial" class="block mb-2 text-sm font-medium text-gray-900">Quantidade Inicial</label>
                <input wire:model="form.quantidade_inicial" type="number" step="0.01" id="quantidade_inicial" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="1000">
                 @error('form.quantidade_inicial') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
             <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                <select wire:model="form.status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="FECHADO">Fechado</option>
                    <option value="ABERTO">Aberto</option>
                    <option value="ESGOTADO">Esgotado</option>
                </select>
                 @error('form.status') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Salvar Item
        </button>
    </form>
</x-modal>