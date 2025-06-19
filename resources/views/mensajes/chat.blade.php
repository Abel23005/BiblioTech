@php
    $mensaje = request()->route('mensaje');
@endphp

<div class="flex flex-col h-full bg-white shadow rounded-lg">
    <!-- Cabecera del Chat -->
    <div class="p-4 border-b border-gray-200 flex justify-between items-center bg-primary-header text-white rounded-t-lg">
        <div>
            <h5 class="text-lg font-semibold">{{ $mensaje->estudiante->nombre }}</h5>
            <small class="text-white opacity-80">{{ ucfirst($mensaje->tipo) }} - {{ ucfirst($mensaje->estado) }}</small>
        </div>
        @if($mensaje->estado !== 'cerrado')
            <form action="{{ route('mensajes.cerrar', $mensaje) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <i class="fas fa-times mr-1"></i> {{ __('app.close_conversation') }}
                </button>
            </form>
        @endif
    </div>

    <!-- Área de Mensajes -->
    <div class="flex-1 p-4 overflow-y-auto bg-gray-50">
        <div class="flex mb-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold bg-[#D4AF37]">
                    {{ strtoupper(substr($mensaje->estudiante->nombre, 0, 1)) }}
                </div>
            </div>
            <div class="ml-3 flex-grow">
                <div class="bg-[#D4AF37] text-white rounded-lg p-3 max-w-sm">
                    <div class="flex justify-between items-center mb-1">
                        <strong class="text-sm">{{ $mensaje->estudiante->nombre }}</strong>
                        <small class="text-xs text-white opacity-80">{{ $mensaje->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                    <p class="text-sm mb-0">{{ $mensaje->mensaje }}</p>
                </div>
            </div>
        </div>

        @if($mensaje->respuesta)
            <div class="flex justify-end mb-4">
                <div class="mr-3 flex-grow text-right">
                    <div class="bg-[#3D9970] text-white rounded-lg p-3 max-w-sm inline-block">
                        <div class="flex justify-between items-center mb-1">
                            <strong class="text-sm">{{ $mensaje->respondedor->nombre ?? 'Administrador' }}</strong>
                            <small class="text-xs text-white opacity-80">{{ $mensaje->updated_at->format('d/m/Y H:i') }}</small>
                        </div>
                        <p class="text-sm mb-0">{{ $mensaje->respuesta }}</p>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold bg-[#3D9970]">
                        {{ strtoupper(substr($mensaje->respondedor->nombre ?? 'A', 0, 1)) }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Formulario de Envío de Mensajes -->
    @if($mensaje->estado !== 'cerrado')
        <div class="p-4 border-t border-gray-200 bg-gray-100 rounded-b-lg">
            <form action="{{ route('mensajes.responder', $mensaje) }}" method="POST">
                @csrf
                <div class="flex space-x-2">
                    <input type="text" name="respuesta" class="flex-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2" 
                           placeholder="{{ __('app.write_your_message') }}" required>
                    <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                        <i class="fas fa-paper-plane mr-2"></i> {{ __('app.send') }}
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>

@push('styles')
<style>
.chat-body {
    background: #1a1d20;
}

.chat-message {
    max-width: 80%;
}

.chat-message.staff {
    margin-left: 20%;
}

.avatar {
    font-size: 1.2rem;
    font-weight: bold;
}
</style>
@endpush 