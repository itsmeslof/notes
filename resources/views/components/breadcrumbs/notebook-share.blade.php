@props(['notebook'])

<div class="flex text-gray-500 space-x-2 font-semibold flex-wrap">
    <x-breadcrumbs.label>
        My Notebooks
    </x-breadcrumbs.label>
    <x-breadcrumbs.label>/</x-breadcrumbs.label>
    <x-links.anchor href="{{ route('notebooks.show', $notebook) }}">
        {{ $notebook->name }}
    </x-links.anchor>
    <x-breadcrumbs.label>/</x-breadcrumbs.label>
    <x-breadcrumbs.active-page-label>
        Share
    </x-breadcrumbs.active-page-label>
</div>
