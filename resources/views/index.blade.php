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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100 border-t-[6px] border-emerald-600 flex flex-col">

        <div class="flex justify-center mt-20">

            <div
                class="w-full sm:max-w-3xl px-10 py-10 bg-white border border-gray-300 shadow-sm overflow-hidden sm:rounded-lg">

                <h1 class="text-gray-700 font-medium text-3xl text-center">Laravel Notebook</h1>
                <p class="text-gray-600 font-medium text-center mt-4">
                    A self-hosted app to manage personal notebooks using markdown, with full support for the
                    <x-links.anchor
                        href="https://spec.commonmark.org/0.30/"
                        target="_blank"
                    >
                        Commonmark
                    </x-links.anchor>
                    and
                    <x-links.anchor
                        href="https://github.github.com/gfm/"
                        target="_blank"
                    >
                        GitHub Flavored
                    </x-links.anchor> Markdown specs.
                </p>

                <p class="text-gray-500 font-medium text-center text-sm mt-4">Built with
                    <x-links.anchor
                        href="https://tailwindcss.com/"
                        target="_blank"
                    >
                        Tailwind
                    </x-links.anchor>
                    ,
                    <x-links.anchor
                        href="https://alpinejs.dev/"
                        target="_blank"
                    >
                        Alpine.js
                    </x-links.anchor>
                    ,
                    <x-links.anchor
                        href="https://laravel.com/"
                        target="_blank"
                    >
                        Laravel
                    </x-links.anchor>
                    and
                    <x-links.anchor
                        href="https://laravel-livewire.com/"
                        target="_blank"
                    >
                        Livewire
                    </x-links.anchor>
                </p>

                <div class="mt-10 mb-10 flex justify-center items-center space-x-4">
                    @if (settings()->get('enable_user_registration'))
                        <x-links.secondary
                            size="sm"
                            :href="route('register')"
                        >
                            Create an account
                        </x-links.secondary>
                        <p class="text-gray-500 font-medium text-sm">or</p>
                    @endif
                    <x-links.primary
                        size="sm"
                        :href="route('login')"
                    >
                        Login
                    </x-links.primary>
                </div>
                <hr />


                <div class="mt-10 flex space-x-4 justify-center">
                    <x-links.anchor
                        href="https://github.com/itsmeslof/notebook"
                        target="_blank"
                        size="sm"
                    >
                        GitHub Repository
                    </x-links.anchor>
                    <x-links.anchor
                        href="https://github.com/itsmeslof/notebook#Roadmap"
                        target="_blank"
                        size="sm"
                    >
                        Roadmap
                    </x-links.anchor>
                    <x-links.anchor
                        href="https://github.com/itsmeslof/notebook#Installation"
                        target="_blank"
                        size="sm"
                    >
                        Installation
                    </x-links.anchor>
                    {{-- <x-links.primary
                        href="#"
                        target="_blank"
                        size="sm"
                    >
                        Live Demo
                    </x-links.primary> --}}
                </div>

            </div>
        </div>

    </div>
</body>

</html>
