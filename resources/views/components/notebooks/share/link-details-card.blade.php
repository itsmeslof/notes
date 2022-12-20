@props(['shareLink'])

<div class="bg-white border border-gray-300 rounded-md p-4 flex justify-between space-x-10 items-center">
    <div class="space-y-2">
        <h3 class="text-gray-600 font-semibold text-lg">{{ $shareLink->hashid }}</h3>
        <x-links.anchor
            size="sm"
            :href="route('shared-notebook.show', $shareLink)"
        >
            {{ route('shared-notebook.show', $shareLink) }}
        </x-links.anchor>
        <p class="text-gray-400 text-sm">
            <span>Notebook name
                <span class="font-bold">
                    {{ $shareLink->hide_notebook_name ? 'hidden' : 'visible' }}
                </span>
                -
                {{ $shareLink->pageCount() }} {{ $shareLink->pageCount() === 1 ? 'page' : 'pages' }} visible
            </span>
        </p>
    </div>
    <x-links.secondary
        href="{{ route('shared-notebook.show', $shareLink) }}"
        size="sm"
    >
        Manage Share Link
    </x-links.secondary>
</div>
