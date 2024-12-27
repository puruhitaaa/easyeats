<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
    :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FreshEats') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-background-light text-text-light dark:bg-background-dark dark:text-text-dark">
    <div class="min-h-screen">
        @include('layouts.navbar')

        <main>
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>

    <x-toast />

    @livewireScripts
</body>
</html>
