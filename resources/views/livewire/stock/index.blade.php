@php
    // Importa o helper de conversão que criamos anteriormente
    use App\Helpers\UnitConverter;
@endphp
<div>
    {{-- Cabeçalho e Botão de Adicionar --}}
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Itens em Estoque</h1>
        <div>
            <button type="button" x-data @click="$dispatch('open-modal', { name: 'create-item' })"
                class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                Adicionar Item
            </button>
        </div>
    </div>

    {{-- Filtros --}}
    <div class="mb-4">
        <label for="status" class="mb-2 block text-sm font-medium text-gray-900">Filtrar Matéria Prima por
            Status:</label>
        <select wire:model.live="statusFilter" id="status"
            class="block w-64 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
            <option value="">Todos</option>
            <option value="ABERTO">Abertos</option>
            <option value="FECHADO">Fechados</option>
        </select>
    </div>

    {{-- Tabela Flowbite --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">Produto</th>
                    <th scope="col" class="px-6 py-3">Estoque</th>
                    <th scope="col" class="px-6 py-3">Qtd. Atual / Inicial</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Data Entrada</th>
                    <th scope="col" class="px-6 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr class="border-b bg-white hover:bg-gray-50" wire:key="{{ $item->id }}">
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                            {{ $item->produto->name }}
                            <span
                                class="block text-xs text-gray-500">{{ $item->produto->type === 'MateriaPrima' ? 'Matéria-Prima' : 'Produto Final' }}</span>
                        </th>
                        <td class="px-6 py-4">{{ $item->estoque->name }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="font-bold">{{ UnitConverter::format($item->quantidade_atual, $item->produto->unidade_medida->value) }}</span>
                            <span class="block text-xs text-gray-500">de
                                {{ UnitConverter::format($item->quantidade_inicial, $item->produto->unidade_medida->value) }}</span>
                        </td>
                        {{-- <td class="px-6 py-4">{{ $item->status }}</td> --}}
                        <td class="px-6 py-4">
                            @php
                                $statusClass = match ($item->status) {
                                    'ABERTO' => 'bg-green-100 text-green-800',
                                    'FECHADO' => 'bg-blue-100 text-blue-800',
                                    'ESGOTADO' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800',
                                };
                            @endphp
                            <span class="{{ $statusClass }} rounded-full px-2 py-1 text-xs font-medium">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $item->data_entrada->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click="$dispatch('edit-item', { id: '{{ $item->id }}' })"
                                class="mr-3 font-medium text-blue-600 hover:underline">Editar</button>
                            <button wire:click="$dispatch('delete-item', { id: '{{ $item->id }}' })"
                                class="font-medium text-red-600 hover:underline">Excluir</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Nenhum item encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginação --}}
    <div class="mt-4">
        {{ $items->links() }}
    </div>

    {{-- Inclusão dos componentes de modal (eles ficam aqui, invisíveis até serem chamados) --}}
    <livewire:stock.create-item />
    <livewire:stock.edit-item />
    <livewire:stock.delete-item />
</div>
