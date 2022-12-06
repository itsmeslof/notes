<x-app-layout
    x-data="data()"
    x-init="extractToc()"
    @enter-edit-mode.window="isEditing = true"
    @discard-changes.window="discardChanges()"
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

    <hr />

    <x-notebooks.pages.page-content-output
        x-show="!isEditing"
        :page="$page"
        :rendered-output="$renderedOutput"
    />

    <livewire:edit-page-content
        :notebook="$notebook"
        :page="$page"
    />

    @push('scripts')
        <script>
            const data = function() {
                return {
                    isEditing: false,
                    discardChanges: function() {
                        this.isEditing = false;
                    },
                    extractToc: function() {
                        let tocElem = document.querySelector('.table-of-contents');
                        tocElem.parentNode.removeChild(tocElem);

                        let tocPlaceholder = document.querySelector('#toc-placeholder');
                        tocPlaceholder.appendChild(tocElem);
                    }
                }
            }
        </script>
    @endpush

</x-app-layout>
