@props(['page'])

<div
    id="markdownOutput"
    class="bg-white border rounded-md"
    {{ $attributes }}
>
    <div class="border-b p-4 flex justify-between">
        <x-notebooks.pages.heading-text :$page />
        <x-notebooks.pages.toc-dropdown />
    </div>
    <div class="flex justify-center px-10 py-10">
        <div class="prose">
            {!! $renderedOutput !!}
        </div>
    </div>
</div>
