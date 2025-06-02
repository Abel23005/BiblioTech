@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Mensajes</h2>
        <a href="{{ route('mensajes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Mensaje
        </a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-dark mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Conversaciones</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($mensajes as $mensaje)
                            <a href="{{ route('mensajes.show', $mensaje) }}" 
                               class="list-group-item list-group-item-action bg-dark text-white border-light 
                                      {{ request()->route('mensaje') && request()->route('mensaje')->id == $mensaje->id ? 'active' : '' }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $mensaje->estudiante->nombre }}</h6>
                                        <small class="text-muted">
                                            <span class="badge bg-{{ $mensaje->estado === 'pendiente' ? 'warning' : ($mensaje->estado === 'respondido' ? 'success' : 'secondary') }}">
                                                {{ ucfirst($mensaje->estado) }}
                                            </span>
                                            {{ $mensaje->tipo }}
                                        </small>
                                    </div>
                                    <small class="text-muted">{{ $mensaje->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-truncate">{{ $mensaje->mensaje }}</p>
                                @if(!$mensaje->leido_at && auth()->user()->id === $mensaje->estudiante_id)
                                    <span class="badge bg-primary">Nuevo</span>
                                @endif
                            </a>
                        @empty
                            <div class="list-group-item bg-dark text-white border-light">
                                <p class="mb-0 text-center">No hay mensajes</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    {{ $mensajes->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-8">
            @if(request()->route('mensaje'))
                @include('mensajes.chat')
            @else
                <div class="card bg-dark">
                    <div class="card-body text-center text-muted">
                        <i class="fas fa-comments fa-3x mb-3"></i>
                        <h5>Selecciona una conversación para ver los mensajes</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 