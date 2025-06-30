<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-blanco-humo">@lang('app.universities_management')</h1>
    </x-slot>
<div class="container mx-auto px-4 py-8 bg-principal rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-blanco-humo">Gestionar Universidades</h1>
            <a href="#" class="bg-cta hover:bg-cta-dark text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                + Nueva Universidad
            </a>
        </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary-header">
                <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Dirección</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Teléfono</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Correo Electrónico</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">UTP</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. Arequipa 265, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 315-9600</td>
                        <td class="px-6 py-4 whitespace-nowrap">contacto@utp.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">UPC</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. San Isidro 123, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 313-3333</td>
                        <td class="px-6 py-4 whitespace-nowrap">info@upc.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">UPN</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. Alfredo Mendiola 6062, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 512-0000</td>
                        <td class="px-6 py-4 whitespace-nowrap">contacto@upn.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">TECSUP</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. Cascanueces 222, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 317-5300</td>
                        <td class="px-6 py-4 whitespace-nowrap">informes@tecsup.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    </div>
</x-app-layout> 