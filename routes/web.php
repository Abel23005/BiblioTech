<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Middleware\AdministradorMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para autenticación con Google (deben estar fuera de cualquier grupo de middleware)
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', App\Http\Middleware\RedirectBasedOnRole::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de libros accesibles para admin y bibliotecario
    Route::resource('libros', LibroController::class);
    // Rutas de préstamos y reservas accesibles para admin y bibliotecario
    Route::resource('prestamos', PrestamoController::class);
    Route::resource('reservas', App\Http\Controllers\ReservaController::class);

    // Rutas del Administrador
    Route::middleware([AdministradorMiddleware::class])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/codigos', [AdminController::class, 'showCodes'])->name('admin.codigos.index');
        Route::resource('usuarios', UsuarioController::class)->except(['show']);
        Route::resource('estudiantes', EstudianteController::class);
        Route::resource('universidads', App\Http\Controllers\UniversidadController::class);
        Route::resource('autores', App\Http\Controllers\AutorController::class);
        Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
    });

    // Rutas para Mensajes
    Route::resource('mensajes', MensajeController::class);
    Route::patch('mensajes/{mensaje}/responder', [MensajeController::class, 'responder'])->name('mensajes.responder');
    Route::patch('mensajes/{mensaje}/cerrar', [MensajeController::class, 'cerrar'])->name('mensajes.cerrar');

    // Rutas para Reportes
    Route::get('/reportes/usuarios', [ReporteController::class, 'usuarios'])->name('reportes.usuarios');
    Route::get('/reportes/alumnos', [ReporteController::class, 'alumnos'])->name('reportes.alumnos');
    Route::get('/reportes/bibliotecarios', [ReporteController::class, 'bibliotecarios'])->name('reportes.bibliotecarios');

    // Rutas para Configuración
    Route::get('/configuracion/general', [ConfiguracionController::class, 'index'])->name('configuracion.general');
    Route::put('/configuracion', [ConfiguracionController::class, 'update'])->name('configuracion.update');
    Route::put('/configuracion/notificaciones', [ConfiguracionController::class, 'notificaciones'])->name('configuracion.notificaciones');

    // Nueva ruta para el dashboard del alumno
    Route::get('alumno/dashboard', [App\Http\Controllers\AlumnoController::class, 'dashboard'])->name('alumno.dashboard');

    // Nueva ruta para ver los préstamos del alumno
    Route::get('alumno/prestamos', [App\Http\Controllers\AlumnoController::class, 'prestamos'])->name('alumno.prestamos');

    // Nueva ruta para ver las reservas del alumno
    Route::get('alumno/reservas', [App\Http\Controllers\AlumnoController::class, 'misReservas'])->name('alumno.reservas');

    // Nueva ruta para ver el perfil del alumno
    Route::get('alumno/perfil', [App\Http\Controllers\AlumnoController::class, 'perfil'])->name('alumno.perfil');

    // Nueva ruta para buscar libros como alumno
    Route::get('alumno/buscar-libros', [App\Http\Controllers\AlumnoController::class, 'buscarLibros'])->name('alumno.buscarLibros');

    // Nueva ruta para actualizar el perfil del alumno
    Route::post('alumno/actualizar-perfil', [App\Http\Controllers\AlumnoController::class, 'actualizarPerfil'])->name('alumno.actualizar-perfil');

    // Ruta para el dashboard del bibliotecario
    Route::get('bibliotecario/dashboard', [App\Http\Controllers\BibliotecarioController::class, 'dashboard'])->name('bibliotecario.dashboard');

    // Nueva ruta para seleccionar universidad
    Route::get('/seleccionar-universidad', [App\Http\Controllers\UniversidadController::class, 'mostrarFormulario'])->name('seleccionar.universidad');
});

// Ruta para el formulario previo de registro
Route::get('pre-register', function () {
    return view('auth.pre-register');
})->name('pre-register');

// Redirigir a pre-register si no hay tipo definido
Route::get('register', function (\Illuminate\Http\Request $request) {
    if (!$request->has('tipo')) {
        return redirect()->route('pre-register');
    }
    // Si hay tipo, continuar con el flujo normal (el controlador RegisteredUserController)
    return app(\App\Http\Controllers\Auth\RegisteredUserController::class)->create($request);
});

// Ruta POST para el registro de usuarios
Route::post('register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('register');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::post('/guardar-universidad', [App\Http\Controllers\UniversidadController::class, 'guardarUniversidad'])->name('guardar.universidad');

require __DIR__.'/auth.php';
