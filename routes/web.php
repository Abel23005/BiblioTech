<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/libros', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Libros',
        'descripcion' => 'Aquí podrás registrar, editar, eliminar y consultar libros disponibles en la biblioteca.'
    ]);
});

Route::get('/categorias', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Categorías',
        'descripcion' => 'Permite organizar los libros por categorías para una mejor clasificación y búsqueda.'
    ]);
});

Route::get('/autores', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Autores',
        'descripcion' => 'Sección para registrar y administrar los autores de los libros en la biblioteca.'
    ]);
});

Route::get('/prestamos', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Préstamos',
        'descripcion' => 'Permite registrar y controlar los préstamos de libros a los usuarios.'
    ]);
});

Route::get('/reservas', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Reservas',
        'descripcion' => 'Aquí podrás gestionar las reservas de libros hechas por los usuarios.'
    ]);
});

Route::get('/dashboard', function () {
    return view('seccion', [
        'titulo' => 'Panel de Control',
        'descripcion' => 'Desde aquí podrás acceder a todas las funcionalidades principales del sistema, como la gestión de libros, préstamos, reservas y usuarios.'
    ]);
});

Route::get('/login', function () {
    return view('seccion', [
        'titulo' => 'Iniciar Sesión',
        'descripcion' => 'Desde esta página los usuarios podrán iniciar sesión en el sistema para acceder a sus funciones personalizadas.'
    ]);
});

Route::get('/register', function () {
    return view('seccion', [
        'titulo' => 'Registro de Usuario',
        'descripcion' => 'Aquí los nuevos usuarios podrán registrarse para obtener acceso al sistema de gestión de biblioteca.'
    ]);
});
