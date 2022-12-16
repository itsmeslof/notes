@props(['page'])

<div class="flex text-gray-500 space-x-2 font-semibold flex-wrap">
    <x-breadcrumbs.label>
        Admin Area
    </x-breadcrumbs.label>
    <x-breadcrumbs.label>/</x-breadcrumbs.label>
    <x-links.anchor href="{{ route('admin.pages.index') }}">
        Static Pages
    </x-links.anchor>
    <x-breadcrumbs.label>/</x-breadcrumbs.label>
    <x-breadcrumbs.active-page-label>
        {{ $page->title }}
    </x-breadcrumbs.active-page-label>
</div>
