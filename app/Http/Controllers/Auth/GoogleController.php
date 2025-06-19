<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->with(['prompt' => 'select_account'])->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Si no existe, lo creamos como alumno por defecto
                $user = User::create([
                    'nombre' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)),
                    'rol' => 'alumno',
                    'codigo' => 'EST-' . strtoupper(Str::random(6)),
                    'universidad_id' => null,
                ]);
            }

            Auth::login($user);
            return redirect()->route('redirect');
        } catch (\Exception $e) {
            // Log del error para depuración
            Log::error('Error al iniciar sesión con Google: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->route('login')->with('error', 'Error al iniciar sesión con Google. Detalles: ' . $e->getMessage());
        }
    }
} 