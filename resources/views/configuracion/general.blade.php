@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="h3 mb-4">Configuración General</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Configuración del Sistema</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('configuracion.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nombre_biblioteca" class="form-label">Nombre de la Biblioteca</label>
                            <input type="text" class="form-control" id="nombre_biblioteca" name="nombre_biblioteca" value="{{ config('app.name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="dias_prestamo" class="form-label">Días máximos de préstamo</label>
                            <input type="number" class="form-control" id="dias_prestamo" name="dias_prestamo" value="{{ config('biblioteca.dias_prestamo', 7) }}">
                        </div>

                        <div class="mb-3">
                            <label for="max_libros" class="form-label">Máximo de libros por usuario</label>
                            <input type="number" class="form-control" id="max_libros" name="max_libros" value="{{ config('biblioteca.max_libros', 3) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar Cambios
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h3 class="h5 mb-0">Notificaciones</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('configuracion.notificaciones') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notificar_vencimiento" name="notificar_vencimiento" checked>
                                <label class="form-check-label" for="notificar_vencimiento">
                                    Notificar vencimientos próximos
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notificar_disponibilidad" name="notificar_disponibilidad" checked>
                                <label class="form-check-label" for="notificar_disponibilidad">
                                    Notificar disponibilidad de libros
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-bell"></i> Actualizar Notificaciones
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 