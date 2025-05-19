@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
    <p class="mb-4">¡Bienvenido, {{ auth()->user()->name }}!</p>
    <p>Estás autenticado y aquí puedes gestionar tu sistema.</p>
</div>
@endsection
