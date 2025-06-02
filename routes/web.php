<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MensajeController;
/*use App\Http\Controllers\ProveedorController; */ 
use App\Http\Controllers\EstudianteController;
/*use App\Http\Controllers\BibliotecarioController;*/
/*use App\Http\Controllers\VisitaController;*/
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\BackupController;

// Ruta principal redirige al dashboard si está autenticado, si no al login
Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

// Rutas para préstamos
Route::resource('prestamos', PrestamoController::class);

// Rutas para libros
Route::get('/libros', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Libros',
        'descripcion' => 'Aquí podrás registrar, editar, eliminar y consultar libros disponibles en la biblioteca.'
    ]);
});

// Rutas para categorías
Route::get('/categorias', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Categorías',
        'descripcion' => 'Permite organizar los libros por categorías para una mejor clasificación y búsqueda.'
    ]);
});

// Rutas para autores
Route::get('/autores', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Autores',
        'descripcion' => 'Sección para registrar y administrar los autores de los libros en la biblioteca.'
    ]);
});

// Rutas para reservas
Route::get('/reservas', function () {
    return view('seccion', [
        'titulo' => 'Gestión de Reservas',
        'descripcion' => 'Aquí podrás gestionar las reservas de libros hechas por los usuarios.'
    ]);
});

// Rutas del panel de control
Route::get('/dashboard', function () {
    return view('seccion', [
        'titulo' => 'Panel de Control',
        'descripcion' => 'Desde aquí podrás acceder a todas las funcionalidades principales del sistema, como la gestión de libros, préstamos, reservas y usuarios.'
    ]);
});

// Rutas de autenticación
/* 
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
*/



// Rutas protegidas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    // Redirigir /home al dashboard
    Route::get('/home', function () {
        return redirect('/dashboard');
    });

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Mensajes
    Route::resource('mensajes', MensajeController::class);
    Route::patch('/mensajes/{mensaje}/responder', [MensajeController::class, 'responder'])->name('mensajes.responder');
    Route::patch('/mensajes/{mensaje}/cerrar', [MensajeController::class, 'cerrar'])->name('mensajes.cerrar');
    
    // Libros
    Route::resource('libros', LibroController::class);
    
    // Proveedores
    /*Route::resource('proveedores', ProveedorController::class); */
    
    // Estudiantes
    Route::resource('estudiantes', EstudianteController::class);
    
    // Bibliotecarios
    /*Route::resource('bibliotecarios', BibliotecarioController::class);*/
    
    // Visitas
    /*Route::resource('visitas', VisitaController::class);*/
    
    // Reportes
    Route::get('/reportes/prestamos', [ReporteController::class, 'prestamos'])->name('reportes.prestamos');
    Route::get('/reportes/usuarios', [ReporteController::class, 'usuarios'])->name('reportes.usuarios');
    
    // Configuración
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.general');
    
    // Base de Datos y Backup
    Route::prefix('database')->group(function () {
        Route::get('/', [DatabaseController::class, 'index'])->name('database.index');
        Route::post('/backup', [DatabaseController::class, 'backup'])->name('database.backup');
        Route::get('/backup', [BackupController::class, 'index'])->name('backup.index');
    });
    
});
