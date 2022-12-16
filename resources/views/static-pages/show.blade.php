<x-app-layout>

    <div>
        <x-markdown-output-panel
            :output="$page->getRenderedOutput()"
            :heading="$page->title"
        />
    </div>

</x-app-layout>
