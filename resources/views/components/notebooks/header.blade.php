<div class="flex justify-between items-center">
    <x-notebooks.heading-text :$notebook />

    <div class="flex space-x-2">
        <x-notebooks.bookmark-button :notebook="$notebook" />

        <x-links.secondary
            size="sm"
            href="{{ route('notebooks.edit', $notebook) }}"
        >
            <x-svg.settings-cog-icon class="mr-2" />
            Notebook Settings
        </x-links.secondary>
        @if (!$notebook->trashed())
            <x-links.primary
                size="sm"
                href="{{ route('notebooks.pages.create', $notebook) }}"
            >
                <x-svg.plus-icon class="mr-2" />
                New Page
            </x-links.primary>
        @endif
    </div>
</div>
