<x-app-layout size="max-w-xl">

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight w-full text-center">
            {{ __('Create Notebook') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8">
        <form
            action="{{ route('notebooks.store') }}"
            method="POST"
        >
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
                    :value="old('name')"
                    autofocus
                />
                @error('name')
                    <p class="text-xs block mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- <div class="mt-6">
                <x-forms.label
                    for="require_passcode"
                    value="Enable Notebook Passcode?"
                />
                <x-forms.select-input
                    x-model="require_passcode"
                    id="require_passcode"
                    name="require_passcode"
                    class="block mt-1 w-full"
                    :value="old('require_passcode')"
                    require
                >
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </x-forms.select-input>
                <p class="text-xs block mt-2 text-gray-500">
                    Selecting
                    <span class="rounded-md text-gray-700 bg-gray-200 px-2">Yes</span>
                    will require the provided
                    passcode to be entered regularly at the specified time interval in order to view or perform any
                    actions on this notebook or its pages.
                </p>
            </div>

            <div class="mt-6">
                <x-forms.label
                    for="notebook_passcode"
                    value="Passcode"
                />
                <x-forms.text-input
                    id="notebook_passcode"
                    name="notebook_passcode"
                    type="text"
                    class="block mt-1 w-full"
                    :value="old('notebook_passcode')"
                    require
                />
            </div>

            <div class="mt-6">
                <x-forms.label
                    for="passcode_duration"
                    value="Require passcode every"
                />
                <div class="flex space-x-4">
                    <x-forms.text-input
                        id="passcode_duration"
                        name="passcode_duration"
                        type="text"
                        class="block mt-1 w-[60px]"
                        :value="old('passcode_duration')"
                        require
                    />
                    <x-forms.select-input
                        id="passcode_interval"
                        name="passcode_interval"
                        class="block mt-1 w-[180px]"
                        :value="old('passcode_interval')"
                        require
                    >
                        <option value="0">Minutes</option>
                        <option value="1">Hours</option>
                    </x-forms.select-input>
                </div>
            </div>

            <x-h-divider /> --}}

            <div class="flex space-x-6 mt-8">
                <x-buttons.primary>
                    Create Notebook
                </x-buttons.primary>
                <x-links.anchor href="{{ url()->previous() }}">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </div>

</x-app-layout>
