<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.books_management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header">{{ __('app.books_management') }}</h2>
                            <a href="{{ route('libros.create') }}" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-plus-circle mr-2"></i> {{ __('app.add_new') }}
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-md">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.title') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.author') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.isbn') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.category') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.status') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($libros as $libro)
                                        <tr>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $libro->id }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $libro->titulo }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $libro->autor }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $libro->isbn }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $libro->categoria }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                @if($libro->disponible)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ __('app.available') }}</span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ __('app.loaned') }}</span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('libros.show', $libro) }}" 
                                                       class="btn-cta px-3 py-1 rounded-md text-xs font-semibold" 
                                                       title="{{ __('app.details') }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('libros.edit', $libro) }}" 
                                                       class="btn-confirm px-3 py-1 rounded-md text-xs font-semibold" 
                                                       title="{{ __('app.edit') }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" 
                                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold"
                                                            title="{{ __('app.delete') }}"
                                                            onclick="confirmarEliminacion('{{ $libro->id }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="py-3 px-4 text-center text-gray-500">{{ __('app.no_results') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 flex justify-end">
                            {{ $libros->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    function confirmarEliminacion(id) {
        if (confirm('{{ __('app.are_you_sure') }}')) {
            document.getElementById('form-eliminar-' + id).submit();
        }
    }
    </script>
    @endpush
</x-app-layout> 