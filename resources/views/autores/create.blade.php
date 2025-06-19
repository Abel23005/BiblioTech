<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-blanco-humo">@lang('app.add_author')</h1>
    </x-slot>
    <div class="container mx-auto px-4 py-8 bg-principal rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('autores.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                @lang('app.back_to_list')
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('autores.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">@lang('app.name'):</label>
                    <input type="text" name="nombre" id="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="biografia" class="block text-gray-700 text-sm font-bold mb-2">@lang('app.biography'):</label>
                    <textarea name="biografia" id="biografia" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('biografia') border-red-500 @enderror">{{ old('biografia') }}</textarea>
                    @error('biografia')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-confirmar hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                        @lang('app.create')
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> 