<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-950 dark:to-slate-900">
        <div class="min-h-screen flex items-center justify-center px-4 py-12">
            <div class="absolute top-4 right-4 sm:top-6 sm:right-6">
                <x-theme-toggle />
            </div>

            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <a href="/" class="inline-flex items-center justify-center">
                        <x-application-logo class="w-16 sm:w-20 fill-current text-primary-600 dark:text-primary-500" />
                    </a>
                    <h1 class="mt-4 text-3xl font-bold text-gray-900 dark:text-white">{{ config('app.name', 'Laravel') }}</h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm">Bienvenido</p>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-slate-700">
                    <div class="px-6 sm:px-8 py-8 sm:py-10">
                        {{ $slot }}
                    </div>
                </div>

                <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    <p>© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </body>
</html>
