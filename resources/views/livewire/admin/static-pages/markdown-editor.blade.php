<div>
    <div
        x-data="{
            originalContent: @js($mdContent),
            newContent: @js($mdContent)
        }"
        @content-changed="newContent = $event.detail.newContent;"
        @save-page-content.window="$wire.save(pageSlug, newContent);"
        @mde-discard-changes.window="newContent = originalContent"
    >

        <livewire:markdown-editor :originalContent="$mdContent" />

    </div>

</div>
