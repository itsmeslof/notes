<div>
    <div class="space-y-4">
        @forelse ($pages as $page)
            <x-admin.static-pages.page-card :page="$page" />
        @empty
            <x-admin.static-pages.no-pages-card />
        @endforelse
    </div>
</div>
