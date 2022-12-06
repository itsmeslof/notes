@props(['title'])

<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <h1 class="text-gray-700 font-medium text-3xl">{{ $title }}</h1>

    <div
        class="w-full sm:max-w-xl mt-10 px-10 py-10 bg-white border border-gray-300 shadow-sm overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
