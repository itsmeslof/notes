<x-app-layout>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <div class="space-y-2 w-full">
            <div class="w-full flex justify-center space-x-4 items-center flex-wrap">
                <x-dashboard-heading-text size="2xl">
                    Manage User
                </x-dashboard-heading-text>
                <span class="text-sm rounded-md bg-gray-300 py-1 px-2 flex font-semibold text-gray-800">
                    {{ $user->name }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 max-w-xl mx-auto space-y-8">
        <div>
            <p class="text-sm">Name</p>
            <p class="text-xl font-bold">{{ $user->name }}</p>
        </div>
        <hr />
        <div class="flex space-x-10">
            <div>
                <p class="text-sm">Email Status</p>
                @if ($user->email_verified_at)
                    <p class="text-xl font-bold text-emerald-400">Email Verified</p>
                @else
                    <p class="text-xl font-bold text-red-400">Email Not Verified</p>
                @endif
            </div>
        </div>
    </div>

    @if (auth()->user()->id !== $user->id)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 p-8 mt-10 max-w-xl mx-auto">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Danger Zone') }}
            </h2>
            <x-h-divider />
            <form
                action="{{ route('admin.users.destroy', $user) }}"
                method="POST"
            >
                @method('DELETE')
                @csrf
                <x-buttons.danger>
                    Delete User
                </x-buttons.danger>
            </form>
            <p class="text-sm block mt-6 text-gray-500">
                Deleting this user will permanently delete their account and all associated data. This can not be
                undone.
            </p>
        </div>
    @endif

</x-app-layout>
