@props(['page'])

<div
    id="markdownOutput"
    class="bg-white border rounded-md"
    {{ $attributes }}
>
    <div class="border-b p-4 flex justify-between">
        <x-notebooks.pages.heading-text :$page />
        <div>
            <x-dropdown
                align="right"
                width="80"
            >
                <x-slot name="trigger">
                    <button
                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                    >
                        <div>Table Of Contents</div>

                        <div class="ml-1">
                            <svg
                                class="fill-current h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div
                        id="toc-placeholder"
                        class="prose px-6 max-h-[240px] overflow-y-scroll"
                    >
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <div class="flex justify-center px-10 py-10">
        <div class="prose">
            {!! $renderedOutput !!}
        </div>
    </div>
</div>
