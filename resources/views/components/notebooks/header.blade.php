<div class="flex justify-between items-center">
    <x-notebooks.heading-text :$notebook />

    <div class="flex space-x-2">
        <x-notebooks.bookmark-button :notebook="$notebook" />

        <x-links.secondary
            size="sm"
            href="{{ route('notebooks.edit', $notebook) }}"
        >
            Notebook Settings
        </x-links.secondary>
        @if (!$notebook->trashed())
            <x-links.primary
                size="sm"
                href="{{ route('notebooks.pages.create', $notebook) }}"
            >
                New Page
            </x-links.primary>
        @endif
    </div>
</div>
