<x-app-layout>

    <x-slot name="header">
        <div class="space-y-2 w-full">
            <div class="flex justify-center">
                <x-breadcrumbs.notebook-page
                    :$notebook
                    :$page
                />
            </div>
            <div class="w-full flex justify-center space-x-4 items-center flex-wrap">
                <x-dashboard-heading-text size="2xl">
                    Edit Page
                </x-dashboard-heading-text>
                <span class="text-sm rounded-md bg-gray-300 py-1 px-2 flex font-semibold text-gray-800">
                    {{ $page->name }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto">
        <form
            action="{{ route('notebooks.pages.update', [$notebook, $page]) }}"
            method="POST"
        >
            @method('PATCH')
            @csrf

            <div>
                <x-forms.label
                    for="name"
                    value="Page Name"
                />
                <x-forms.text-input
                    id="name"
                    name="name"
                    type="text"
                    class="block mt-1 w-full"
                    :value="old('name', $page->name)"
                    autofocus
                />
                @error('name')
                    <p class="text-xs block mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex space-x-6 mt-8">
                <x-buttons.primary>
                    Update Page
                </x-buttons.primary>
                <x-links.anchor href="{{ url()->previous() }}">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </div>

    @if (!$page->trashed())
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 mt-10 max-w-xl mx-auto">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Danger Zone') }}
            </h2>
            <x-h-divider />
            <form
                action="{{ route('notebooks.pages.destroy', [$notebook, $page]) }}"
                method="POST"
            >
                @method('DELETE')
                @csrf
                <x-buttons.danger>
                    Delete Page
                </x-buttons.danger>
            </form>
            <p class="text-sm block mt-6 text-gray-500">
                Deleting this page will move it to the
                <span class="rounded-md text-gray-800 bg-gray-300 px-2">Trashed</span>
                category, where it will be permanently deleted after 30 days, on
                {{ now()->add('days', 30)->toFormattedDateString() }}
            </p>
        </div>
    @endif

</x-app-layout>
