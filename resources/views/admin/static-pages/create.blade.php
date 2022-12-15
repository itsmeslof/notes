<x-app-layout>

    <x-slot name="header">
        <div class="w-full flex space-x-4 justify-center items-center">
            <x-dashboard-heading-text size="2xl">
                Create Static Page
            </x-dashboard-heading-text>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto">
        <form
            action="{{ route('admin.pages.store') }}"
            method="POST"
            x-data="{ slug: '' }"
        >
            @csrf

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
                    :value="old('title')"
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
                    :value="old('slug')"
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
                    Create Page
                </x-buttons.primary>
                <x-links.anchor href="{{ route('admin.pages.index') }}">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </div>

</x-app-layout>
