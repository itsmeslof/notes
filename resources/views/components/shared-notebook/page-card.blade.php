@props(['shareLink', 'page'])

<div
    href="{{ route('shared-notebook.page.show', [$shareLink, $page]) }}"
    class="flex flex-col space-y-8 justify-between bg-white overflow-hidden sm:rounded-lg border border-gray-300 p-4 hover:shadow-md focus:outline-none focus-visible:border-emerald-300 focus-visible:ring ring-emerald-300 transition ease-in-out duration-150"
>
    <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
            <h2>{{ $page->name }}</h2>
        </div>
        <p>{{ $page->created_at->diffForHumans() }}</p>
    </div>
    <div class="mt-10">
        <x-links.secondary
            href="{{ route('shared-notebook.page.show', [$shareLink, $page]) }}"
            size="sm"
        >
            View Page
        </x-links.secondary>
    </div>
</div>
