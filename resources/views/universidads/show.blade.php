<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-blanco-humo">@lang('app.university_details')</h1>
    </x-slot>
    <div class="container mx-auto px-4 py-8 bg-principal rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('universidads.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                @lang('app.back_to_list')
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">@lang('app.name'):</p>
                <p class="text-gray-900 text-lg">{{ $universidad->nombre }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">@lang('app.address'):</p>
                <p class="text-gray-900 text-lg">{{ $universidad->direccion ?? __('app.not_available') }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold">@lang('app.phone'):</p>
                <p class="text-gray-900 text-lg">{{ $universidad->telefono ?? __('app.not_available') }}</p>
            </div>

            <div class="mb-6">
                <p class="text-gray-700 text-sm font-bold">@lang('app.email'):</p>
                <p class="text-gray-900 text-lg">{{ $universidad->email ?? __('app.not_available') }}</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('universidads.edit', $universidad->id) }}" class="bg-confirmar hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                    @lang('app.edit')
                </a>
            </div>
        </div>
    </div>
</x-app-layout> 