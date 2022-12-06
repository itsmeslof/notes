<div class="w-full flex justify-between items-center">
    <x-breadcrumbs.notebook-page
        :$notebook
        :$page
    />

    <div>
        <div
            class="flex space-x-2"
            x-show="!isEditing"
        >
            <x-links.secondary
                size="sm"
                href="{{ route('notebooks.pages.edit', [$notebook, $page]) }}"
            >
                <x-svg.settings-cog-icon class="mr-2" />
                Page Settings
            </x-links.secondary>
            @if (!$page->trashed())
                <x-buttons.primary
                    size="sm"
                    @click="$dispatch('enter-edit-mode')"
                >
                    <x-svg.plus-icon class="mr-2" />
                    Edit Page Content
                </x-buttons.primary>
            @endif
        </div>

        <div
            class="flex space-x-2"
            x-show="isEditing"
        >
            <x-buttons.secondary
                size="sm"
                @click="$dispatch('discard-changes')"
            >
                {{-- <x-svg.settings-cog-icon class="mr-2" /> --}}
                Discard Changes
            </x-buttons.secondary>
            <x-buttons.primary
                size="sm"
                @click="$dispatch('save-page-content')"
            >
                {{-- <x-svg.plus-icon class="mr-2" /> --}}
                Save Changes
            </x-buttons.primary>
        </div>
    </div>
</div>
