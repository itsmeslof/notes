<x-app-layout size="max-w-xl">

    @if ($notebook->trashed())
        <x-slot name="alerts">
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
        </x-slot>
    @endif

    <x-slot name="header">
        <div class="w-full flex space-x-4 justify-center items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Edit Notebook') }}
            </h2>
            <span class="text-sm rounded-md bg-gray-300 py-1 px-2 flex font-semibold text-gray-800">
                {{ $notebook->name }}
            </span>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8">
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

    @if ($notebook->trashed())
        <div class="bg-orange-300 overflow-hidden shadow-sm sm:rounded-lg text-orange-900 p-8 mt-10">
            This notebook will be permanently deleted <span class="bg-black/20 py-1 px-2 text-sm text-white rounded-lg">
                {{ $notebook->days_remaining->diffForHumans() }}</span> on
            {{ $notebook->deleted_at->add('days', 30)->toFormattedDateString() }}
        </div>
    @else
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 mt-10">
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
