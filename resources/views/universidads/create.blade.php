<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-blanco-humo">@lang('app.add_university')</h1>
    </x-slot>
<div class="container mx-auto px-4 py-8 bg-principal rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-blanco-humo">@lang('app.create_university')</h1>
        <a href="{{ route('universidads.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
            @lang('app.back_to_list')
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <form action="{{ route('universidads.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">@lang('app.name'):</label>
                <input type="text" name="nombre" id="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">@lang('app.address'):</label>
                <input type="text" name="direccion" id="direccion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('direccion') border-red-500 @enderror" value="{{ old('direccion') }}">
                @error('direccion')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">@lang('app.phone'):</label>
                <input type="text" name="telefono" id="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telefono') border-red-500 @enderror" value="{{ old('telefono') }}">
                @error('telefono')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">@lang('app.email'):</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
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