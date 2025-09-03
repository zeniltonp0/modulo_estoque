@props(['name', 'title'])

<div
    x-data="{ show: false, name: '{{ $name }}' }"
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false"
    style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-60"
    x-transition
>
    <div @click.away="show = false" class="bg-white rounded-lg shadow-lg w-full max-w-1xl mx-4">
        {{-- Título do Modal --}}
        <div class="p-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            <button @click="show = false" class="text-gray-400 hover:text-gray-800 text-2xl font-bold">&times;</button>
        </div>
        {{-- Conteúdo do Modal --}}
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>