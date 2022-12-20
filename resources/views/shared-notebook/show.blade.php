<x-guest-layout>

    <header>
        <x-breadcrumbs.shared-notebook.show
            :$shareLink
            :$notebook
        />
    </header>

    <div class="grid grid-cols-3 gap-4">
        @forelse ($visiblePages as $page)
            <x-shared-notebook.page-card
                :$notebook
                :$shareLink
                :$page
            />
        @empty
            <div class="bg-white col-span-3 overflow shadow-sm sm:rounded-lg border border-gray-300 p-4">
                No pages found
            </div>
        @endforelse
    </div>

</x-guest-layout>
