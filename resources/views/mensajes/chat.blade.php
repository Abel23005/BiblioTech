@php
    $mensaje = request()->route('mensaje');
@endphp

<div class="card bg-dark">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">{{ $mensaje->estudiante->nombre }}</h5>
            <small>{{ ucfirst($mensaje->tipo) }} - {{ ucfirst($mensaje->estado) }}</small>
        </div>
        @if($mensaje->estado !== 'cerrado')
            <form action="{{ route('mensajes.cerrar', $mensaje) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-outline-light">
                    <i class="fas fa-times"></i> Cerrar conversación
                </button>
            </form>
        @endif
    </div>

    <div class="card-body chat-body" style="height: 400px; overflow-y: auto;">
        <div class="chat-message student mb-3">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 40px; height: 40px;">
                        {{ strtoupper(substr($mensaje->estudiante->nombre, 0, 1)) }}
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <div class="bg-primary text-white rounded p-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <strong>{{ $mensaje->estudiante->nombre }}</strong>
                            <small class="text-light">{{ $mensaje->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                        <p class="mb-0">{{ $mensaje->mensaje }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($mensaje->respuesta)
            <div class="chat-message staff mb-3">
                <div class="d-flex flex-row-reverse">
                    <div class="flex-shrink-0">
                        <div class="avatar bg-success text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 40px; height: 40px;">
                            {{ strtoupper(substr($mensaje->respondedor->nombre ?? 'A', 0, 1)) }}
                        </div>
                    </div>
                    <div class="flex-grow-1 me-3">
                        <div class="bg-success text-white rounded p-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <strong>{{ $mensaje->respondedor->nombre ?? 'Administrador' }}</strong>
                                <small class="text-light">{{ $mensaje->updated_at->format('d/m/Y H:i') }}</small>
                            </div>
                            <p class="mb-0">{{ $mensaje->respuesta }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if($mensaje->estado !== 'cerrado')
        <div class="card-footer">
            <form action="{{ route('mensajes.responder', $mensaje) }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="respuesta" class="form-control bg-dark text-white" 
                           placeholder="Escribe tu respuesta..." required>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Enviar
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