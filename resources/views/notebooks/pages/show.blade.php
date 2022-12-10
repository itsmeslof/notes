<x-app-layout
    x-data="data()"
    x-init="extractToc()"
    @enter-edit-mode.window="isEditing = true"
    @discard-changes.window="isEditing = false"
>

    <x-slot name="alerts">
        @if ($notebook->trashed())
            <x-notebooks.pages.notebook-trashed-alert :$notebook />
        @endif

        @if ($page->trashed())
            <x-notebooks.pages.trashed-alert
                :$notebook
                :$page
            />
        @endif
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <x-notebooks.pages.header
            :$notebook
            :$page
        />
    </x-slot>

    <x-notebooks.pages.page-content-output
        x-show="!isEditing"
        :page="$page"
        :rendered-output="$renderedOutput"
    />

    <livewire:edit-page-content
        :notebook="$notebook"
        :page="$page"
    />

    <script>
        const data = () => {
            return {
                isEditing: false
            }
        };

        function extractToc() {
            let tocElem = document.querySelector('.table-of-contents');
            tocElem.parentNode.removeChild(tocElem);

            let tocPlaceholder = document.querySelector('#toc-placeholder');
            tocPlaceholder.appendChild(tocElem);
        }
    </script>

</x-app-layout>
