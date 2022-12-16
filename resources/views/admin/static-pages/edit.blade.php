<x-app-layout>

    <x-slot name="header">
        <div class="w-full flex space-x-4 justify-center items-center">
            <x-dashboard-heading-text size="2xl">
                Edit Page
            </x-dashboard-heading-text>
            <span class="text-sm rounded-md bg-gray-300 py-1 px-2 flex font-semibold text-gray-800">
                {{ $page->title }}
            </span>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto">
        <form
            action="{{ route('admin.pages.update', $page) }}"
            method="POST"
            x-data="{ slug: '{{ $page->slug }}' }"
        >
            @method('PATCH')
            @csrf

            <input
                type="hidden"
                name="page_id"
                value="{{ $page->id }}"
            >

            <div>
                <x-forms.label
                    for="title"
                    value="Page Title"
                />
                <x-forms.text-input
                    id="title"
                    name="title"
                    type="text"
                    class="block mt-1 w-full"
                    :value="old('title', $page->title)"
                    autofocus
                />
                @error('title')
                    <p class="text-xs block mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6">
                <x-forms.label
                    for="slug"
                    value="Page Slug"
                />
                <x-forms.text-input
                    id="slug"
                    name="slug"
                    type="text"
                    x-model="slug"
                    class="block mt-1 w-full"
                    :value="old('slug', $page->slug)"
                    required
                />
                <p class="text-xs block mt-2 text-gray-500">
                    Page URL:
                    <x-links.anchor size="sm">
                        {{ config('app.url') }}/<span x-text="slug || '{slug}'"></span>
                    </x-links.anchor>
                </p>
                @error('slug')
                    <p class="text-xs block mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex space-x-6 mt-8">
                <x-buttons.primary type="submit">
                    Update Page
                </x-buttons.primary>
                <x-links.anchor href="{{ route('admin.pages.show', [$page]) }}">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 mt-10 max-w-xl mx-auto">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Danger Zone') }}
        </h2>
        <x-h-divider />
        <form
            action="{{ route('admin.pages.destroy', $page) }}"
            method="POST"
        >
            @method('DELETE')
            @csrf

            <x-buttons.danger>
                Delete Page
            </x-buttons.danger>
        </form>
        <p class="text-sm block mt-6 text-gray-500">
            Deleting this page will permanently delete it. This can not be undone.
        </p>
    </div>

</x-app-layout>
