<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Códigos de Autenticación para Bibliotecarios
        </h2>
    </x-slot>
    <div class="container mx-auto py-8">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
            <p class="mb-4 text-gray-700">
                Estos códigos son únicos y permanentes. Todo bibliotecario debe seleccionar su universidad y luego ingresar el código correspondiente para poder registrarse. <strong>No se pueden cambiar ni eliminar.</strong>
            </p>
            <table class="table-auto w-full border-collapse">
                            <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nombre de Universidad</th>
                        <th class="px-4 py-2 border">Código de Registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($universidades as $universidad)
                                    <tr>
                            <td class="border px-4 py-2">{{ $universidad->id }}</td>
                            <td class="border px-4 py-2">{{ $universidad->name }}</td>
                            <td class="border px-4 py-2 font-bold">{{ $universidad->codigo_registro }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        </div>
    </div>
</x-app-layout> 