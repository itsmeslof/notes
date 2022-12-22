<x-app-layout x-data="">

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <x-dashboard-heading-text>Manage Users</x-dashboard-heading-text>
        </div>
    </x-slot>

    <x-admin.users.users-list :$users />

</x-app-layout>
