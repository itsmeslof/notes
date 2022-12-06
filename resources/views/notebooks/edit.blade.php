<x-app-layout>

    <x-slot name="alerts">
        @if ($notebook->trashed())
            <x-notebooks.trashed-alert :$notebook />
        @endif
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <div class="w-full flex space-x-4 justify-center items-center">
            <x-dashboard-heading-text size="2xl">
                Edit Notebook
            </x-dashboard-heading-text>
            <span class="text-sm rounded-md bg-gray-300 py-1 px-2 flex font-semibold text-gray-800">
                {{ $notebook->name }}
            </span>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto">
        <form
            action="{{ route('notebooks.update', $notebook) }}"
            method="POST"
        >
            @method('PATCH')
            @csrf

            <div>
                <x-forms.label
                    for="name"
                    value="Notebook Name"
                />
                <x-forms.text-input
                    id="name"
                    name="name"
                    type="text"
                    class="block mt-1 w-full"
                    :value="old('name', $notebook->name)"
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
                    Update Notebook
                </x-buttons.primary>
                <x-links.anchor href="{{ url()->previous() }}">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </div>

    @if (!$notebook->trashed())
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 mt-10 max-w-xl mx-auto">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Danger Zone') }}
            </h2>
            <x-h-divider />
            <form
                action="{{ route('notebooks.destroy', $notebook) }}"
                method="POST"
            >
                @method('DELETE')
                @csrf
                <x-buttons.danger>
                    Delete Notebook
                </x-buttons.danger>
            </form>
            <p class="text-sm block mt-6 text-gray-500">
                Deleting this notebook will move it to the
                <span class="rounded-md text-gray-800 bg-gray-300 px-2">Trashed</span>
                category, where it will be permanently deleted after 30 days, on
                {{ now()->add('days', 30)->toFormattedDateString() }}
            </p>
        </div>
    @endif

</x-app-layout>
