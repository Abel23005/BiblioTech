<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/redirect';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Sobrescribimos el método attemptLogin para validar la contraseña de forma segura.
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        // Usar Auth::attempt para validar las credenciales de forma segura
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            return true;
        }

        return false;
    }

    /**
     * Sobrescribir el método authenticated para manejar la redirección basada en el rol.
     */
    // protected function authenticated(Request $request, $user)
    // {
    //     return redirect('/');
    // }
}
