<x-app-layout>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <x-notebooks.header :$notebook />
    </x-slot>

    <div class="grid grid-cols-3 gap-4">
        @forelse ($notebook->pages as $page)
            <x-page-card
                :$notebook
                :$page
            />
        @empty
            <div class="bg-white col-span-3 overflow shadow-sm sm:rounded-lg border border-gray-300 p-4">
                No pages found
            </div>
        @endforelse
    </div>

</x-app-layout>
