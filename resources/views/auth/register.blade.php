<x-guest-layout>
    @php
        $tipo = request('tipo');
    @endphp
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" value="Nombre" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apellidos" value="Apellidos" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Correo Electrónico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar Contraseña" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Universidad (siempre visible y obligatoria) -->
        <div class="mt-4">
            <x-input-label for="universidad_id" value="Universidad" />
            <select id="universidad_id" name="universidad_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Selecciona tu universidad</option>
                @foreach($universidades as $universidad)
                    <option value="{{ $universidad->id }}" {{ old('universidad_id') == $universidad->id ? 'selected' : '' }}>{{ $universidad->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('universidad_id')" class="mt-2" />
        </div>

        <!-- Código de Registro solo para bibliotecario -->
        @if($tipo === 'bibliotecario')
        <div class="mt-4">
            <x-input-label for="codigo" value="Código de Registro" />
            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autocomplete="codigo" />
            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
        </div>
        @endif

        <input type="hidden" name="tipo" value="{{ $tipo }}">

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                ¿Ya registrado?
            </a>

            <button type="submit" style="background: red; color: white; border: 2px solid black; font-size: 1rem; padding: 0.5rem 1.5rem; margin-left: 1rem; border-radius: 0.375rem; font-weight: 600;">Registrarse</button>
        </div>
    </form>
</x-guest-layout>
