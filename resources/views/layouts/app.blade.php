<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .bg-primary-header {
                background-color: #2C3E50;
            }
            .bg-content {
                background-color: #F5EBD0;
            }
            .btn-cta {
                background-color: #D4AF37;
                color: white;
            }
            .btn-cta:hover {
                background-color: #B38F2E;
            }
            .btn-confirm {
                background-color: #3D9970;
                color: white;
            }
            .btn-confirm:hover {
                background-color: #2E7353;
            }
            .text-primary-header {
                color: #2C3E50;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-content flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-primary-header shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-white leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
