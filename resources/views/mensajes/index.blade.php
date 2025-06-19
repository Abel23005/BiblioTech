<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.messages') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:flex-row h-[70vh] border border-gray-200 rounded-lg shadow-md">
                        <!-- Columna de Conversaciones (Izquierda) -->
                        <div class="w-full md:w-1/3 border-r border-gray-200 flex flex-col bg-gray-50">
                            <div class="p-4 bg-primary-header text-white flex justify-between items-center rounded-tl-lg">
                                <h3 class="text-lg font-semibold">{{ __('app.conversations') }}</h3>
                                <a href="{{ route('mensajes.create') }}" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                    <i class="fas fa-plus mr-2"></i> {{ __('app.new_message') }}
                                </a>
                            </div>
                            <div class="flex-1 overflow-y-auto">
                                <div class="bg-white divide-y divide-gray-200">
                                    @forelse($mensajes as $mensaje)
                                        <a href="{{ route('mensajes.show', $mensaje) }}" 
                                           class="block px-4 py-3 hover:bg-gray-100 {{ request()->route('mensaje') && request()->route('mensaje')->id == $mensaje->id ? 'bg-blue-50' : '' }}">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <h4 class="text-sm font-semibold text-primary-header">{{ $mensaje->estudiante->nombre }}</h4>
                                                    <p class="text-xs text-gray-600 truncate">{{ $mensaje->mensaje }}</p>
                                                </div>
                                                <span class="text-xs text-gray-500">{{ $mensaje->created_at->diffForHumans() }}</span>
                                            </div>
                                            @if(!$mensaje->leido_at && auth()->user()->id === $mensaje->estudiante->usuario_id)
                                                <span class="ml-auto mt-1 px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Nuevo</span>
                                            @endif
                                        </a>
                                    @empty
                                        <div class="px-4 py-3 text-center text-gray-500">
                                            {{ __('app.no_messages') }}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="p-4 border-t border-gray-200 bg-gray-100">
                                {{ $mensajes->links() }}
                            </div>
                        </div>

                        <!-- Columna de Chat (Derecha) -->
                        <div class="w-full md:w-2/3 flex flex-col bg-white rounded-br-lg">
                            @if(request()->route('mensaje'))
                                @include('mensajes.chat')
                            @else
                                <div class="flex-1 flex items-center justify-center bg-gray-50 text-gray-500 rounded-br-lg">
                                    <div class="text-center">
                                        <i class="fas fa-comments text-4xl mb-4 text-primary-header"></i>
                                        <h5 class="text-lg font-semibold text-primary-header">{{ __('app.select_conversation') }}</h5>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 