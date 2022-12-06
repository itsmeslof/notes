<x-guest-layout>
    <x-auth-card title="Reset Password">
        <form
            method="POST"
            action="{{ route('password.update') }}"
        >
            @csrf

            <!-- Password Reset Token -->
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >

            <!-- Email Address -->
            <div>
                <x-forms.label
                    for="email"
                    :value="__('Email')"
                />

                <x-forms.text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email', $request->email)"
                    required
                    autofocus
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

            <div class="flex items-center mt-12">
                <x-buttons.primary class="mr-4">
                    Reset Password
                </x-buttons.primary>
                <x-links.anchor href="/">
                    Cancel
                </x-links.anchor>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
