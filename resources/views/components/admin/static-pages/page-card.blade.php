<x-admin.site-settings.setting-card class="flex justify-between space-x-10 items-center">
    <div>
        <h3 class="text-gray-600 font-semibold text-lg">{{ $page->title }}</h3>
        <p class="text-gray-400 text-sm">
            {{ route('page.show', $page) }}
        </p>
    </div>
    <x-links.secondary
        href="{{ route('admin.pages.show', $page) }}"
        size="sm"
    >
        Manage Page
    </x-links.secondary>
</x-admin.site-settings.setting-card>
