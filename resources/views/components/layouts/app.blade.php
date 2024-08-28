<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? env('APP_NAME') }}</title>

        <link rel="icon" type="image/x-icon" href="{{ url('/img/leshar.ico') }}" /> {{-- icone navegador --}}
        <meta name="theme-color" content="#171717" /> {{-- tema da barra do navegador mobile --}}
        <meta name="apple-mobile-web-app-status-bar-style" content="#171717" /> {{-- tema da barra do navegador mobile --}}

        @persist('tallstackui')
            <tallstackui:script />
        @endpersist 
        @livewireStyles

        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="min-h-screen">
        <x-toast />
        @if (!request()->routeIs('login') && !request()->routeIs('register'))
            
            <x-navbar />

        @endif

        <main>

            {{ $slot }}

        </main>

        @livewireScripts
    </body>
</html>
