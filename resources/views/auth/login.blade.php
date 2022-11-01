<x-guest-layout>
    <x-auth-card title="Login">
        <!-- Session Status -->
        <x-auth-session-status
            class="mb-4"
            status="{{ session('status') }}"
        />

        <form
            method="POST"
            action="{{ route('login') }}"
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

            <!-- Password -->
            <div class="mt-6">
                <x-forms.label
                    for="password"
                    value="Password"
                />

                <x-forms.text-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label
                    for="remember_me"
                    class="inline-flex items-center"
                >
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-emerald-600 shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50"
                        name="remember"
                    >
                    <span class="ml-2 font-medium text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-12">
                <x-buttons.primary>
                    Login
                </x-buttons.primary>
            </div>

            <div class="w-full h-[1px] bg-gray-200 my-6"></div>

            <div class="space-x-4 flex items-center justify-end">
                @if (Route::has('password.request'))
                    <x-links.default href="{{ route('password.request') }}">
                        Forgot your password?
                    </x-links.default>
                @endif

                <x-links.default href="{{ route('register') }}">
                    Don't have an account?
                </x-links.default>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
