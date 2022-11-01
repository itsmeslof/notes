<x-guest-layout>
    <x-auth-card title="Register">
        <form
            method="POST"
            action="{{ route('register') }}"
        >
            @csrf

            <!-- Name -->
            <div>
                <x-forms.label
                    for="name"
                    :value="__('Name')"
                />

                <x-forms.text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                />

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2"
                />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <x-forms.label
                    for="email"
                    :value="__('Email')"
                />

                <x-forms.text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            <!-- Password -->
            <div class="mt-6">
                <x-forms.label
                    for="password"
                    :value="__('Password')"
                />

                <x-forms.text-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />
            </div>

            <!-- Confirm Password -->
            <div class="mt-6">
                <x-forms.label
                    for="password_confirmation"
                    :value="__('Confirm Password')"
                />

                <x-forms.text-input
                    id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                />

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2"
                />
            </div>

            <div class="mt-12">
                <x-buttons.primary>
                    Register
                </x-buttons.primary>
            </div>

            <div class="w-full h-[1px] bg-gray-200 my-6"></div>

            <div class="flex justify-end">
                <x-links.default
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="{{ route('login') }}"
                >
                    Already have an account?
                </x-links.default>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
