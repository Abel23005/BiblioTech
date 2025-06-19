<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-blanco-humo">@lang('app.author_management')</h1>
    </x-slot>
    <div class="container mx-auto px-4 py-8 bg-principal rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('autores.create') }}" class="bg-cta hover:bg-cta-dark text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                @lang('app.add_author')
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">@lang('app.success')!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">@lang('app.error')!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            @lang('app.name')
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            @lang('app.biography')
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            @lang('app.actions')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($autores as $autor)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $autor->nombre }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ Str::limit($autor->biografia, 100) ?? __('app.not_available') }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('autores.show', $autor->id) }}" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i> @lang('app.view')
                                    </a>
                                    <a href="{{ route('autores.edit', $autor->id) }}" class="text-confirmar hover:text-green-700">
                                        <i class="fas fa-edit"></i> @lang('app.edit')
                                    </a>
                                    <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" onsubmit="return confirm('@lang('app.confirm_delete_author')');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash-alt"></i> @lang('app.delete')
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">
                                @lang('app.no_authors_found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $autores->links() }}
        </div>
    </div>
</x-app-layout> 