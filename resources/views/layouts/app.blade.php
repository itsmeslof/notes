<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Nunito:wght@400;500;600;700&display=swap"
    >

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@props(['alerts', 'header', 'size' => 'max-w-7xl'])

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <div class="{{ $size }} mx-auto py-10 space-y-10">
            @if (isset($alerts))
                {{ $alerts }}
            @endif

            @if (isset($header))
                <header>
                    <div class="flex justify-between items-center">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="max-w-7xl mx-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
