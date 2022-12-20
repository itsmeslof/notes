<x-guest-layout>

    <header>
        <x-breadcrumbs.shared-notebook.page
            :$shareLink
            :$notebook
            :$page
        />
    </header>

    <main class="max-w-7xl mx-auto">
        <x-markdown-output-panel
            :output="$renderedOutput"
            :heading="$page->name"
        />
    </main>

</x-guest-layout>
