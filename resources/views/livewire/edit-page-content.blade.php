<div>
    <div
        x-data
        x-show="isEditing"
        @discard-changes.window="$wire.resetState()"
        @save-page-content.window="$wire.save()"
    >
        <div class="flex space-x-1">
            <button
                class="border border-b-0 px-3 py-1 text-sm rounded-t-md {{ $activeTab === 'edit' ? 'bg-emerald-600 border-transparent text-white' : 'bg-white border-gray-300' }}"
                wire:click="enterEditMode()"
            >
                Editing
            </button>
            <button
                class="border border-b-0 px-3 py-1 text-sm rounded-t-md {{ $activeTab === 'preview' ? 'bg-emerald-600 border-transparent text-white' : 'bg-white border-gray-300' }}"
                wire:click="enterPreviewMode()"
            >
                Preview
                <span
                    wire:loading.delay
                    wire:target="enterPreviewMode"
                >
                    Loading...
                </span>
            </button>
        </div>

        <!-- Tab Content -->
        <div class="bg-red-200 relative">
            <div
                class="absolute top-0 bottom-0 left-0 right-0 bg-black/30 flex justify-center items-start py-10"
                wire:loading.delay
                wire:target="enterPreviewMode,save"
            >
                <div class="w-full flex flex-col space-y-4 justify-center items-center">
                    <div class="lds-default">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div>
                        <p
                            class="text-white"
                            wire:loading.delay
                            wire:target="save"
                        >
                            Saving Page Content...
                        </p>
                        <p
                            class="text-white"
                            wire:loading.delay
                            wire:target="enterPreviewMode"
                        >
                            Creating Page Preview...
                        </p>
                    </div>
                </div>
            </div>
            @if ($activeTab === 'edit')
                <textarea
                    class="bg-white border rounded-md border-emerald-600 border-2 rounded-tl-none w-full min-h-[400px]"
                    wire:model.lazy="editInput"
                >{{ $editInput }}</textarea>
            @elseif ($activeTab === 'preview')
                <div
                    id="markdownPreviewOutput"
                    class="bg-white border rounded-md border-emerald-600 border-2 p-10 py-20 rounded-tl-none w-full min-h-[400px] flex justify-center"
                >
                    <div class="prose">
                        {!! $previewOutput !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
