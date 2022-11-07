<x-app-layout>

    <x-slot name="alerts">
        @if ($notebook->trashed())
            <div class="space-y-2">
                <div class="mb-4 bg-orange-300 rounded-md text-orange-800 px-4 py-3 shadow-md">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg
                                class="fill-current h-6 w-6 text-orange-800 mr-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                                />
                            </svg>
                            <p class="font-bold">This Notebook is trashed.</p>
                        </div>
                        <form
                            action="{{ route('notebooks.restore', $notebook) }}"
                            method="POST"
                        >
                            @method('PATCH')
                            @csrf

                            <x-buttons.ghost
                                size="sm"
                                class="bg-orange-500 border border-transparent rounded-md font-semibold text-orange-50 hover:bg-orange-400 active:bg-orange-600"
                            >
                                Restore Notebook
                            </x-buttons.ghost>
                        </form>
                    </div>
                </div>

                <div class="bg-orange-300 overflow-hidden shadow-sm sm:rounded-lg text-orange-900 p-8">
                    This notebook will be permanently deleted <span
                        class="bg-black/20 py-1 px-2 text-sm text-white rounded-full"
                    >
                        {{ $notebook->days_remaining->diffForHumans() }}</span> on
                    {{ $notebook->deleted_at->add('days', 30)->toFormattedDateString() }}
                </div>
            </div>
        @endif
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            {{ $notebook->name }}
            @if ($notebook->bookmarked)
                <x-svg.bookmarked-icon class="ml-4 text-pink-500" />
            @endif
        </h2>

        <div class="flex space-x-2">
            <x-notebooks.bookmark-button :notebook="$notebook" />

            <x-links.secondary
                size="sm"
                href="{{ route('notebooks.edit', $notebook) }}"
            >
                <x-svg.settings-cog-icon class="mr-2" />
                Notebook Settings
            </x-links.secondary>
            @if (!$notebook->trashed())
                <x-links.primary
                    size="sm"
                    href="{{ route('notebooks.create') }}"
                >
                    <x-svg.plus-icon class="mr-2" />
                    New Page
                </x-links.primary>
            @endif
        </div>
    </x-slot>

</x-app-layout>
