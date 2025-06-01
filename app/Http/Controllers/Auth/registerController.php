<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/dashboard';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        \Log::info('Datos de registro recibidos:', $data);
        
        $validator = Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            \Log::error('Errores de validación:', $validator->errors()->toArray());
        }

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Usuario
     */
    protected function create(array $data)
    {
        try {
            $user = Usuario::create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rol' => 'lector'
            ]);
            \Log::info('Usuario creado exitosamente:', ['id' => $user->id, 'email' => $user->email]);
            return $user;
        } catch (\Exception $e) {
            \Log::error('Error al crear usuario:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
