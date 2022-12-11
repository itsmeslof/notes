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

    {{-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script> --}}

    <link
        rel="stylesheet"
        href="https://unpkg.com/@tailwindcss/typography@0.4.x/dist/typography.min.css"
    >

    @livewireStyles
</head>

@props(['alerts', 'header', 'size' => 'max-w-7xl'])

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        @if (request()->routeIs('admin.*'))
            @include('layouts.admin.sub-navigation')
        @endif

        <div
            class="{{ $size }} mx-auto py-10 space-y-10"
            {{ $attributes }}
        >
            @if (isset($alerts))
                {{ $alerts }}
            @endif

            @if (isset($header))
                <header>
                    {{ $header }}
                </header>
            @endif

            <main class="max-w-7xl mx-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
    @stack('scripts')
</body>

</html>
