<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Universidad;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $universidades = Universidad::all();
        return view('auth.register', compact('universidades'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $tipo = $request->input('tipo');

        if ($tipo === 'alumno') {
            $universidad = \App\Models\Universidad::find($request->universidad_id);
            $dominios = [
                'UTP' => '@utp.edu.pe',
                'UPC' => '@upc.edu.pe',
                'UPN' => '@upn.pe',
                'TECSUP' => '@tecsup.edu.pe',
            ];
            $dominio = $dominios[$universidad->name] ?? null;

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'lowercase',
                    'email',
                    'max:255',
                    'unique:'.User::class,
                    function($attribute, $value, $fail) use ($dominio) {
                        if ($dominio && !str_ends_with($value, $dominio)) {
                            $fail('El correo debe ser institucional y terminar en ' . $dominio);
                        }
                    }
                ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'universidad_id' => ['required', 'exists:universidads,id'],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'alumno',
            'universidad_id' => $request->universidad_id,
            ]);
        } elseif ($tipo === 'bibliotecario') {
            $request->validate([
                'nombre' => ['required', 'string', 'max:255'],
                'apellidos' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'universidad_id' => ['required', 'exists:universidads,id'],
                'codigo' => ['required', 'string', 'max:255'],
            ]);

            $user = User::create([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol' => 'bibliotecario',
                'universidad_id' => $request->universidad_id,
            'codigo' => $request->codigo,
        ]);
        } else {
            abort(400, 'Tipo de registro no válido.');
        }

        event(new Registered($user));
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }
}
