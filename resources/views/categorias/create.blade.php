<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Agregar Categoría
        </h2>
    </x-slot>
    <div class="py-12 bg-content">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6 text-primary-header">Nueva Categoría</h1>
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="3" class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <a href="{{ route('categorias.index') }}" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">Cancelar</a>
                            <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 