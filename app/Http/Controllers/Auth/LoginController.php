<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Sobrescribimos el método attemptLogin para validar la contraseña sin hash.
     */
    protected function attemptLogin(Request $request)
    {
        $user = Usuario::where('email', $request->email)->first();

        if (!$user) {
            return false;
        }

        // Comparación con contraseña en texto plano
        if ($request->password === $user->password) {
            // (Opcional) Convertimos la contraseña a Bcrypt para el futuro
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::login($user);
            return true;
        }

        return false;
    }
}
