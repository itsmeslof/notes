<x-guest-layout>
    <x-auth-card title="Verify Email Address">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-12 flex items-center">
            <form
                method="POST"
                action="{{ route('verification.send') }}"
            >
                @csrf

                <div class="mr-4">
                    <x-buttons.primary>
                        Resend Verification Email
                    </x-buttons.primary>
                </div>
            </form>

            <form
                method="POST"
                action="{{ route('logout') }}"
            >
                @csrf

                <button
                    type="submit"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    Logout
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
