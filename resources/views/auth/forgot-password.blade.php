<x-guest-layout>
    <x-auth-card title="Forgot your password?">
        <div class="mb-6 text-sm text-gray-600">
            {{ __('No problem. Just let us know your email address and we\'ll send you a link to reset your password.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        <form
            method="POST"
            action="{{ route('password.email') }}"
        >
            @csrf

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
                    :value="old('email')"
                    required
                    autofocus
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            <div class="flex items-center mt-12">
                <x-buttons.primary class="mr-4">
                    Email Password Reset Link
                </x-buttons.primary>
                <x-links.default href="{{ url()->previous() }}">
                    Cancel
                </x-links.default>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
