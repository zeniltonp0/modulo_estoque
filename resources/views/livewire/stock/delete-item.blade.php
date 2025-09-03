<x-modal name="delete-item" title="Confirmar Exclusão">
    @if ($item)
        <div class="text-center">
            <p class="text-gray-600 mb-4">
                Você tem certeza que deseja excluir o item <span class="font-bold">{{ $item->produto->name }}</span>?
                <br>
                Esta ação não poderá ser desfeita.
            </p>

            <div class="flex justify-center space-x-4">
                <button type="button" @click="$dispatch('close-modal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                    Cancelar
                </button>
                <button type="button" wire:click="delete" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Sim, Excluir
                </button>
            </div>
        </div>
    @else
        <p>Nenhum item selecionado para exclusão.</p>
    @endif
</x-modal>