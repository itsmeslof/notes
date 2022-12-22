<nav class="bg-white border-b border-gray-200">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex">
                    <x-nav-link
                        :href="route('admin.site-settings.index')"
                        :active="request()->routeIs('admin.site-settings.index')"
                    >
                        Site Settings
                    </x-nav-link>
                    <x-nav-link
                        href="{{ route('admin.users.index') }}"
                        :active="request()->routeIs('admin.users.index')"
                    >
                        Manage Users
                    </x-nav-link>
                    <x-nav-link
                        href="{{ route('admin.pages.index') }}"
                        :active="request()->routeIs('admin.pages.index')"
                    >
                        Manage Static Pages
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
