<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Administrador;
use App\Models\Universidad;
use App\Models\Bibliotecario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $universidades = Universidad::all();
        
        // Eliminamos la recuperación de datos de pre-registro de la sesión
        $oldRol = old('rol', null);
        $oldUniversidadId = old('universidad_id', null);
        $oldCodigoRegistro = old('codigo_registro', null);
        $oldApellidos = old('apellidos', null);

        \Log::info('Cargando showRegistrationForm con datos old (final):', [
            'oldRol' => $oldRol,
            'oldUniversidadId' => $oldUniversidadId,
            'oldCodigoRegistro' => $oldCodigoRegistro,
            'oldApellidos' => $oldApellidos,
        ]);

        return view('auth.register', compact('universidades', 'oldRol', 'oldUniversidadId', 'oldCodigoRegistro', 'oldApellidos'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        \Log::info('Datos de registro recibidos:', $data);
        
        $rules = [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol' => ['required', 'string', 'in:alumno,administrador,bibliotecario'],
        ];

        // Reglas condicionales para el rol de alumno
        if (isset($data['rol']) && $data['rol'] === 'alumno') {
            $rules['universidad_id'] = ['required', 'exists:universidads,id'];
            $rules['email'][] = function ($attribute, $value, $fail) use ($data) {
                $universidad = Universidad::find($data['universidad_id']);
                if ($universidad) {
                    $domain_map = [
                        'TECSUP' => 'tecsup.edu.pe',
                        'UTP' => 'utp.edu.pe',
                        'UPN' => 'upn.edu.pe',
                        'UPC' => 'upc.edu.pe',
                    ];
                    $expected_domain = $domain_map[$universidad->name] ?? null;

                    if ($expected_domain && !Str::endsWith($value, '@' . $expected_domain)) {
                        $fail('El correo electrónico debe pertenecer al dominio de la universidad seleccionada (' . $expected_domain . ').');
                    }
                } else {
                    $fail('La universidad seleccionada no es válida.');
                }
            };
        }

        // Reglas condicionales para el rol de bibliotecario
        if (isset($data['rol']) && $data['rol'] === 'bibliotecario') {
            $rules['universidad_id'] = ['required', 'exists:universidads,id'];
            $rules['codigo_registro'] = ['required', 'string', 'size:6', function ($attribute, $value, $fail) use ($data) {
                $universidad = \App\Models\Universidad::find($data['universidad_id'] ?? null);
                if (!$universidad || $universidad->codigo_registro !== $value) {
                    $fail('El código de autenticación no es válido para la universidad seleccionada.');
                }
            }];
            $rules['apellidos'] = ['required', 'string', 'max:255'];
        } else {
            $rules['universidad_id'] = ['nullable', 'exists:universidads,id'];
            $rules['codigo_registro'] = ['nullable', 'string', 'size:6']; // Hacerlo nullable si no es bibliotecario
            $rules['apellidos'] = ['nullable', 'string', 'max:255'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            \Log::error('Errores de validación:', $validator->errors()->toArray());
        }

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $codigo = '';
        if ($data['rol'] === 'alumno') {
            $codigo = 'EST-' . strtoupper(Str::random(6));
        } else if ($data['rol'] === 'administrador') {
            $codigo = 'ADM-' . strtoupper(Str::random(6));
        } else if ($data['rol'] === 'bibliotecario') {
            // Generar un código único para cada bibliotecario, no usar el código de registro de la universidad
            $codigo = 'BIB-' . strtoupper(Str::random(6));
        }

        try {
            $user = User::create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rol' => $data['rol'],
                'codigo' => $codigo,
                'universidad_id' => $data['universidad_id'] ?? null, // Usar la universidad_id del formulario, o null si no existe
            ]);
            
            // Eliminar la limpieza de datos de pre-registro de la sesión

            
            \Log::info('Usuario creado exitosamente:', ['id' => $user->id, 'email' => $user->email]);
            
            if ($data['rol'] === 'alumno') {
                // La lógica de redirección a seleccionar.universidad ahora se manejará en redirectTo
                // y también en el middleware RedirectBasedOnRole
            } else if ($data['rol'] === 'administrador') {
                Administrador::create([
                    'usuario_id' => $user->id,
                    'codigo' => $codigo,
                    'nombre' => $data['nombre'],
                    'email' => $data['email'],
                    'cargo' => 'Administrador General',
                    'activo' => true
                ]);
            } else if ($data['rol'] === 'bibliotecario') {
                Bibliotecario::create([
                    'user_id' => $user->id,
                    'codigo' => $codigo,
                    'nombre' => $data['nombre'],
                    'apellidos' => $data['apellidos'],
                ]);
            }
            
            return $user;
        } catch (\Exception $e) {
            \Log::error('Error al crear usuario:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    protected function redirectTo()
    {
        if (session('needs_universidad')) {
            session()->forget('needs_universidad');
            return '/seleccionar-universidad';
        }
        
        $user = auth()->user();
        if ($user->rol === 'administrador') {
            return '/admin/dashboard';
        }
        
        return '/alumno/dashboard';
    }
}
