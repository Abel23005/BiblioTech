@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="h3 mb-4">Reporte de Préstamos</h2>

    @foreach($prestamos as $mes => $prestamosMes)
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0">{{ Carbon\Carbon::createFromFormat('Y-m', $mes)->format('F Y') }}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Usuario</th>
                            <th>Fecha Préstamo</th>
                            <th>Fecha Devolución</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prestamosMes as $prestamo)
                        <tr>
                            <td>{{ $prestamo->libro->titulo }}</td>
                            <td>{{ $prestamo->usuario->name }}</td>
                            <td>{{ $prestamo->fecha_prestamo }}</td>
                            <td>{{ $prestamo->fecha_devolucion }}</td>
                            <td>
                                @if($prestamo->estado == 'activo')
                                    <span class="badge bg-success">Activo</span>
                                @elseif($prestamo->estado == 'devuelto')
                                    <span class="badge bg-info">Devuelto</span>
                                @else
                                    <span class="badge bg-danger">Vencido</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection 