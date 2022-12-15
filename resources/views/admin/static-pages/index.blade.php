<x-app-layout x-data="">

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <x-admin.static-pages.header />
    </x-slot>

    <x-admin.static-pages.pages-list :pages="$pages" />

</x-app-layout>
