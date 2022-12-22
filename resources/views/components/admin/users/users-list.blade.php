<div>
    <div class="space-y-4">
        @forelse ($users as $user)
            <x-admin.users.user-card :$user />
        @empty
            <div
                class"bg-white
                border
                border-gray-300
                rounded-md
                p-4"
            >
                No users found
            </div>
        @endforelse
    </div>
</div>
