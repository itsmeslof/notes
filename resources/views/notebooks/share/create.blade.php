<x-app-layout>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <div class="w-full flex flex-col space-y-4 justify-center items-center">
            <x-breadcrumbs.notebook-share :$notebook />
            <x-dashboard-heading-text size="2xl">
                Create a new Share Link
            </x-dashboard-heading-text>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-3xl mx-auto">
        <p>Select the pages you want to be visible for this share link</p>

        <form
            action="{{ route('notebooks.share.store', $notebook) }}"
            method="POST"
            class="mt-10 space-y-8"
        >
            @csrf

            <div class="space-y-4 py-4 pl-10 border-l-4 border-gray-200">
                @forelse ($notebook->pages as $page)
                    <div>
                        <label
                            for="page{{ $page->id }}"
                            class="inline-flex items-center"
                        >
                            <input
                                id="page{{ $page->id }}"
                                type="checkbox"
                                class="rounded border-gray-300 text-emerald-600 shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-300 focus:ring-opacity-50"
                                name="active_pages[]"
                                value="{{ $page->id }}"
                            >
                            <span class="ml-2 font-medium text-sm text-gray-600">{{ $page->name }}</span>
                        </label>
                    </div>
                @empty
                    <p>There are no pages in this notebook. Please create a page first.</p>
                @endforelse
            </div>

            <div class="block w-full">
                <x-forms.label
                    for="passcode_duration"
                    value="Notebook Name Visibility"
                />
                <div class="flex space-x-4">
                    <x-forms.select-input
                        id="hide_notebook_name"
                        name="hide_notebook_name"
                        class="block mt-1 w-[240px]"
                        :value="old('hide_notebook_name', 0)"
                        require
                    >
                        <option value="0">Visible</option>
                        <option value="1">Hidden</option>
                    </x-forms.select-input>
                </div>
            </div>

            @if ($notebook->pages->count())
                <x-h-divider />
                <div>
                    <div class="flex space-x-6">
                        <x-buttons.primary>
                            Create Share Link
                        </x-buttons.primary>
                        <x-links.anchor href="{{ url()->previous() }}">
                            Cancel
                        </x-links.anchor>
                    </div>
                </div>
            @endif
        </form>
    </div>
    {{-- <div class="space-y-10">
        <x-dashboard-heading-text>
            Select the pages you wish the be visible for this share link
        </x-dashboard-heading-text>

    </div> --}}

</x-app-layout>
