@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="card mx-auto" style="max-width: 400px;">
    <div class="card-body">
        <h4 class="mb-4">Iniciar Sesión</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contraseña:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</div>
@endsection
