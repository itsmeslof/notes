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
                Page Settings
            </x-links.secondary>
            <x-buttons.primary
                size="sm"
                @click="$dispatch('enter-edit-mode')"
            >
                Edit Page Content
            </x-buttons.primary>
        </div>

        <div
            class="flex space-x-2"
            x-show="isEditing"
        >
            <x-buttons.secondary
                size="sm"
                @click="$dispatch('mde-discard-changes')"
            >
                Discard Changes
            </x-buttons.secondary>
            <x-buttons.primary
                size="sm"
                @click="$dispatch('save-page-content')"
            >
                Save Changes
            </x-buttons.primary>
        </div>
    </div>
</div>
