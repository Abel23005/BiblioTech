<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

// Ruta de usuarios eliminada para evitar conflicto con la definición principal en web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
}); 