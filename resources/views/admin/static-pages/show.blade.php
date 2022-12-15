<x-app-layout
    x-data="{ isEditing: false, pageSlug: '{{ $page->slug }}' }"
    @enter-edit-mode="isEditing = true;"
    @mde-discard-changes="isEditing = false;"
>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <x-admin.static-pages.show.header :$page />
    </x-slot>

    <div x-show="!isEditing">
        <x-markdown-output-panel
            :output="$page->getRenderedOutput()"
            :heading="$page->title"
        />
    </div>

    <div x-show="isEditing">
        <livewire:admin.static-pages.markdown-editor :mdContent="$page->md_content" />
    </div>

</x-app-layout>
