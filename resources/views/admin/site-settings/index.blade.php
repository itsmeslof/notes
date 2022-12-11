<x-app-layout x-data="">

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <x-admin.site-settings.header />
    </x-slot>

    <x-admin.site-settings.settings-list :settings="$settings" />

</x-app-layout>
