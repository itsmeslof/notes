<x-app-layout>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Notebooks') }}
        </h2>

        <x-links.primary
            size="sm"
            href="{{ route('notebooks.create') }}"
        >
            <x-svg.plus-icon class="mr-2" />
            New Notebook
        </x-links.primary>
    </x-slot>

    <div
        x-data="{ activeTab: 'all' }"
        class="space-y-10"
    >
        <!-- Tabs -->
        <div
            class="w-full flex flex-row space-x-2 border-b-2 border-gray-300"
            x-cloak
        >
            <button
                class="font-medium border-b-2 hover:text-gray-600 -mb-[2px] pb-3 px-2 focus:outline-none focus-visible:border-emerald-300 focus-visible:ring ring-emerald-300 transition ease-in-out duration-150'"
                :class="activeTab === 'all' ? 'border-emerald-500 text-gray-600' : 'border-transparent text-gray-400'"
                @click="activeTab = 'all'"
            >
                All Notebooks ({{ count($allNotebooks) }})
            </button>
            <button
                class="font-medium border-b-2 hover:text-gray-600 -mb-[2px] pb-3 px-2 focus:outline-none focus-visible:border-emerald-300 focus-visible:ring ring-emerald-300 transition ease-in-out duration-150'"
                :class="activeTab === 'bookmarks' ? 'border-emerald-500 text-gray-600' : 'border-transparent text-gray-400'"
                @click="activeTab = 'bookmarks'"
            >
                Bookmarks ({{ count($bookmarkedNotebooks) }})
            </button>
            <button
                class="font-medium border-b-2 hover:text-gray-600 -mb-[2px] pb-3 px-2 focus:outline-none focus-visible:border-emerald-300 focus-visible:ring ring-emerald-300 transition ease-in-out duration-150'"
                :class="activeTab === 'archived' ? 'border-emerald-500 text-gray-600' : 'border-transparent text-gray-400'"
                @click="activeTab = 'archived'"
            >
                Archived ({{ count($archivedNotebooks) }})
            </button>
            <button
                class="font-medium border-b-2 hover:text-gray-600 -mb-[2px] pb-3 px-2 focus:outline-none focus-visible:border-emerald-300 focus-visible:ring ring-emerald-300 transition ease-in-out duration-150'"
                :class="activeTab === 'trashed' ? 'border-emerald-500 text-gray-600' : 'border-transparent text-gray-400'"
                @click="activeTab = 'trashed'"
            >
                Trashed ({{ count($trashedNotebooks) }})
            </button>
        </div>

        <!-- Tab content -->
        <div>
            <div
                class="grid grid-cols-3 gap-4"
                x-show="activeTab === 'all'"
            >
                @forelse ($allNotebooks as $notebook)
                    <x-notebook-card :$notebook />
                @empty
                    <div class="bg-white col-span-3 overflow shadow-sm sm:rounded-lg border border-gray-300 p-4">
                        No notebooks found
                    </div>
                @endforelse
            </div>

            <div
                class="grid grid-cols-3 gap-4"
                x-show="activeTab === 'bookmarks'"
            >
                @forelse ($bookmarkedNotebooks as $notebook)
                    <x-notebook-card :$notebook />
                @empty
                    <div class="bg-white col-span-3 overflow shadow-sm sm:rounded-lg border border-gray-300 p-4">
                        No notebooks found
                    </div>
                @endforelse
            </div>

            <div
                class="grid grid-cols-3 gap-4"
                x-show="activeTab === 'archived'"
            >
                @forelse ($archivedNotebooks as $notebook)
                    <x-notebook-card :$notebook />
                @empty
                    <div class="bg-white col-span-3 overflow shadow-sm sm:rounded-lg border border-gray-300 p-4">
                        No notebooks found
                    </div>
                @endforelse
            </div>

            <div
                class="grid grid-cols-3 gap-4"
                x-show="activeTab === 'trashed'"
            >
                @forelse ($trashedNotebooks as $notebook)
                    <x-notebook-card :$notebook />
                @empty
                    <div class="bg-white col-span-3 overflow shadow-sm sm:rounded-lg border border-gray-300 p-4">
                        No notebooks found
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</x-app-layout>
