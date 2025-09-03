<div>
    <div class="text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Bem-vindo(a)!</h1>
        <p class="text-gray-600 mb-8">Por favor, selecione um estoque para começar a trabalhar.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($estoques as $estoque)
            <div wire:click="selectStock('{{ $estoque->id }}')" class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-transform duration-200 cursor-pointer text-center">
                <svg class="mx-auto h-12 w-12 text-blue-500 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125V6.375c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v.001c0 .621.504 1.125 1.125 1.125z" />
                </svg>

                <h2 class="text-lg font-semibold text-gray-700">{{ $estoque->name }}</h2>
            </div>
        @empty
             <div class="col-span-full bg-yellow-100 text-yellow-800 p-4 rounded-lg text-center">
                Nenhum estoque cadastrado. Por favor, adicione um estoque primeiro.
            </div>
        @endforelse
    </div>
</div>