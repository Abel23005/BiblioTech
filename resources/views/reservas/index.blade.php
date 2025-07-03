<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Reservas
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-4xl font-bold mb-4">Gestión de Reservas</h1>
                    <p class="mb-8">Aquí se mostrará la lista de reservas de libros realizadas por los usuarios.</p>
                    <div class="flex flex-col items-center justify-center py-12">
                        <span class="text-lg text-gray-500">No hay reservas registradas actualmente.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 