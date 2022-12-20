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

    <title>{{ config('app.name', 'Laravel Notebook') }}</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >
    <link
        rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Nunito:wght@400;500;600;700&display=swap"
    >

    <link
        rel="stylesheet"
        href="https://unpkg.com/@tailwindcss/typography@0.4.x/dist/typography.min.css"
    >

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-100 font-sans antialiased border-t-[6px] border-emerald-600">
    <div {{ $attributes->merge(['class' => 'pt-16']) }}>
        <main class="max-w-7xl mx-auto w-full space-y-10">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>

</html>
