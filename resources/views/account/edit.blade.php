<x-app-layout>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <div class="w-full flex space-x-4 justify-center items-center">
            <x-dashboard-heading-text size="2xl">
                Edit Account
            </x-dashboard-heading-text>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto">
        <form
            action="{{ route('account.update') }}"
            method="POST"
        >
            @method('PATCH')
            @csrf

            <div>
                <x-forms.label
                    for="name"
                    value="Name"
                />
                <x-forms.text-input
                    id="name"
                    name="name"
                    type="text"
                    class="block mt-1 w-full"
                    :value="old('name', $user->name)"
                    autofocus
                />
                @error('name')
                    <p class="text-xs block mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6">
                <x-forms.label
                    for="email"
                    value="Email"
                />
                <x-forms.text-input
                    id="email"
                    name="email"
                    type="email"
                    class="block mt-1 w-full"
                    :value="old('email', $user->email)"
                    autofocus
                />
                @error('email')
                    <p class="text-xs block mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex space-x-6 mt-8">
                <x-buttons.primary>
                    Update Account
                </x-buttons.primary>
                <x-links.anchor href="{{ url()->previous() }}">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto mt-10">
        <form
            action="{{ route('account.password.update') }}"
            method="POST"
        >
            @method('PATCH')
            @csrf

            <div class="mt-6">
                <x-forms.label
                    for="current_password"
                    :value="__('Current Password')"
                />

                <x-forms.text-input
                    id="current_password"
                    class="block mt-1 w-full"
                    type="password"
                    name="current_password"
                    required
                />

                <x-input-error
                    :messages="$errors->get('current_password')"
                    class="mt-2"
                />
            </div>

            <!-- Confirm Password -->
            <div class="mt-6">
                <x-forms.label
                    for="new_password"
                    :value="__('New Password')"
                />

                <x-forms.text-input
                    id="new_password"
                    class="block mt-1 w-full"
                    type="password"
                    name="new_password"
                    required
                />

                <x-input-error
                    :messages="$errors->get('new_password')"
                    class="mt-2"
                />
            </div>

            <div class="flex space-x-6 mt-8">
                <x-buttons.primary>
                    Update Password
                </x-buttons.primary>
            </div>
        </form>
    </div>
</x-app-layout>
