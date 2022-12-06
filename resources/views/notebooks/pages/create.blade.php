<x-app-layout>

    <x-slot name="header">
        <div class="w-full flex space-x-4 justify-center items-center">
            <x-dashboard-heading-text size="2xl">
                Create Page for Notebook
            </x-dashboard-heading-text>
            <span class="text-sm rounded-md bg-gray-300 py-1 px-2 flex font-semibold text-gray-800">
                {{ $notebook->name }}
            </span>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto">
        <form
            action="{{ route('notebooks.pages.store', $notebook) }}"
            method="POST"
        >
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
                    :value="old('name')"
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
                    Create Page
                </x-buttons.primary>
                <x-links.anchor href="{{ url()->previous() }}">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </div>

</x-app-layout>
