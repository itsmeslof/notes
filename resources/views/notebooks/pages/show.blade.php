<x-app-layout
    x-data="{ isEditing: false, notebookHash: '{{ $notebook->hashid }}', pageHash: '{{ $page->hashid }}' }"
    @enter-edit-mode.window="isEditing = true;"
    @mde-discard-changes.window="isEditing = false;"
>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <x-notebooks.pages.header
            :$notebook
            :$page
        />
    </x-slot>

    <div x-show="!isEditing">
        <x-markdown-output-panel
            :output="$renderedOutput"
            :heading="$page->name"
        />
    </div>

    <div x-show="isEditing">
        <livewire:notebooks.pages.markdown-editor :mdContent="$page->content" />
    </div>

</x-app-layout>
