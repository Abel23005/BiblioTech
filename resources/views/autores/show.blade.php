<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-blanco-humo">@lang('app.author_details')</h1>
    </x-slot>
    <div class="container mx-auto px-4 py-8 bg-principal rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('autores.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                @lang('app.back_to_list')
            </a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">@lang('app.name'):</p>
                <p class="text-gray-900 text-lg">{{ $autor->nombre }}</p>
            </div>
            <div class="mb-6">
                <p class="text-gray-700 text-sm font-bold">@lang('app.biography'):</p>
                <p class="text-gray-900 text-lg">{{ $autor->biografia ?? __('app.not_available') }}</p>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('autores.edit', $autor->id) }}" class="bg-confirmar hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                    @lang('app.edit')
                </a>
            </div>
        </div>
    </div>
</x-app-layout> 