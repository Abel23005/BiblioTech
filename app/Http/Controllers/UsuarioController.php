<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->rol === 'administrador' && $user->universidad_id === null) {
            // Administrador general ve todos
        $usuarios = User::latest()->paginate(10);
        } elseif ($user->rol === 'bibliotecario') {
            // Bibliotecario solo ve alumnos de su universidad
            $usuarios = User::where('universidad_id', $user->universidad_id)
                ->where('rol', 'alumno')
                ->latest()->paginate(10);
        } else {
            // Administrador de universidad ve todos los usuarios de su universidad
            $usuarios = User::where('universidad_id', $user->universidad_id)->latest()->paginate(10);
        }
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $universidades = \App\Models\Universidad::all();
        return view('admin.usuarios.create', compact('universidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|in:administrador,bibliotecario,alumno',
        ]);

        User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(User $usuario)
    {
        $universidades = \App\Models\Universidad::all();
        return view('admin.usuarios.edit', compact('usuario', 'universidades'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($usuario->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'rol' => 'required|in:administrador,bibliotecario,alumno',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
} 