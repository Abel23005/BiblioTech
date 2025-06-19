<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.user_management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-3xl font-extrabold text-primary-header">{{ __('app.user_management') }}</h1>
                            <a href="{{ route('usuarios.create') }}" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-plus-circle mr-2"></i> {{ __('app.add_user') }}
                            </a>
                        </div>

                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <!-- Alumnos -->
                        <h2 class="text-xl font-bold text-primary-header mb-2 mt-6">Alumnos</h2>
                        <div class="overflow-x-auto mb-8">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.name') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.email') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.university') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.role') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $hayAlumnos = false; @endphp
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->rol === 'alumno')
                                            @php $hayAlumnos = true; @endphp
                                            <tr>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->name }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->email }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->universidad->nombre ?? 'Sin universidad' }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->rol }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200 flex space-x-2">
                                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn-cta px-3 py-1 rounded-md text-xs font-semibold">{{ __('app.edit') }}</a>
                                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('{{ __('app.are_you_sure') }}');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold">{{ __('app.delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @if(!$hayAlumnos)
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-center text-gray-500">No hay alumnos registrados.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Bibliotecarios -->
                        <h2 class="text-xl font-bold text-primary-header mb-2 mt-6">Bibliotecarios</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.name') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.email') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.university') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.role') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $hayBiblios = false; @endphp
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->rol === 'bibliotecario')
                                            @php $hayBiblios = true; @endphp
                                            <tr>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->name }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->email }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->universidad->nombre ?? 'Sin universidad' }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200">{{ $usuario->rol }}</td>
                                                <td class="py-3 px-4 border-b border-gray-200 flex space-x-2">
                                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn-cta px-3 py-1 rounded-md text-xs font-semibold">{{ __('app.edit') }}</a>
                                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('{{ __('app.are_you_sure') }}');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold">{{ __('app.delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @if(!$hayBiblios)
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-center text-gray-500">No hay bibliotecarios registrados.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $usuarios->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 