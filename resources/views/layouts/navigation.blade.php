<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('alumno.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                        Dashboard
                    </a>
                    <a href="{{ route('alumno.prestamos') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                        Mis Préstamos
                    </a>
                    <a href="{{ route('alumno.reservas') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                        Mis Reservas
                    </a>
                    <a href="{{ route('alumno.perfil') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                        Perfil
                    </a>
                    <a href="{{ route('alumno.buscarLibros') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                        Buscar Libros
                    </a>
                    <li>
                        <a href="{{ route('prestamos.create') }}" class="block px-4 py-2 text-blue-600 hover:bg-blue-100 rounded transition">Prestar libro</a>
                    </li>
                    @if(auth()->user()->rol == 'admin' || auth()->user()->rol == 'bibliotecario')
                    <a href="{{ route('prestamos.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                        Préstamos
                    </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @auth
                                <div>{{ Auth::user()->nombre }}</div>
                            @endauth

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('alumno.dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                Dashboard
            </a>
            <a href="{{ route('alumno.prestamos') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                Mis Préstamos
            </a>
            <a href="{{ route('alumno.reservas') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                Mis Reservas
            </a>
            <a href="{{ route('alumno.perfil') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                Perfil
            </a>
            <a href="{{ route('alumno.buscarLibros') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                Buscar Libros
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->nombre }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
