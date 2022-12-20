@props(['shareLink', 'notebook'])

<div class="flex text-gray-500 space-x-2 font-semibold flex-wrap">
    <x-breadcrumbs.label>
        Shared Notebook
    </x-breadcrumbs.label>
    <x-breadcrumbs.label>/</x-breadcrumbs.label>
    <x-breadcrumbs.active-page-label>
        @if ($shareLink->hide_notebook_name)
            <span class="italic">Notebook Name Hidden</span>
        @else
            {{ $notebook->name }}
        @endif
    </x-breadcrumbs.active-page-label>
</div>
