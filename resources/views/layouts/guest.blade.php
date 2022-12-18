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

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100 font-sans antialiased px-10 space-y-16 border-t-[6px] border-emerald-600">
    <div class="flex justify-center">
        <div class="bg-emerald-600 inline-block rounded-b-xl px-16 py-4">
            <div class="flex items-center space-x-4 text-emerald-50">
                <x-svg.notebook-icon />
                <p>{{ config('app.name', 'Laravel Notebook') }}</p>
            </div>
        </div>
    </div>

    {{ $slot }}
</body>

</html>
