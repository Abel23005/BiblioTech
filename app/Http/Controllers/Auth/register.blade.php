@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="card mx-auto" style="max-width: 400px;">
    <div class="card-body">
        <h4 class="mb-4">Registro</h4>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label>Nombre:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contraseña:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Registrarse</button>
        </form>
    </div>
</div>
@endsection
