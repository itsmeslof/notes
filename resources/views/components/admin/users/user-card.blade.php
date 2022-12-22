<x-admin.site-settings.setting-card class="flex justify-between space-x-10 items-center">
    <div>
        <h3 class="text-gray-600 font-semibold text-lg">{{ $user->name }}</h3>
        <div class="flex space-x-4 mt-2">
            @if ($user->email_verified_at)
                <p class="text-emerald-400 text-sm">
                    Email Verified
                </p>
            @else
                <p class="text-red-400 text-sm">
                    Email Not Verified
                </p>
            @endif
        </div>
    </div>
    <x-links.secondary
        href="{{ route('admin.users.show', $user) }}"
        size="sm"
    >
        Manage User
    </x-links.secondary>
</x-admin.site-settings.setting-card>
