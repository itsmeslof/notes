<div class="w-full flex justify-between items-center">
    <x-admin.breadcrumbs.static-page :$page />

    <div>
        <div
            class="flex space-x-2"
            x-show="!isEditing"
        >
            <x-links.secondary
                size="sm"
                href="{{ route('admin.pages.edit', [$page]) }}"
            >
                <x-svg.settings-cog-icon class="mr-2" />
                Page Settings
            </x-links.secondary>
            <x-buttons.primary
                size="sm"
                @click="$dispatch('enter-edit-mode')"
            >
                <x-svg.plus-icon class="mr-2" />
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
