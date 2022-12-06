@props(['notebook'])

<div class="mb-4 bg-orange-300 rounded-md text-orange-800 px-4 py-3 shadow-md">
    <div class="flex-col space-y-4">
        <div class="flex">
            <div class="flex-col w-full">
                <p class="font-bold">This Notebook is trashed.</p>
                <p>This notebook will be permanently deleted <span class="font-bold">
                        {{ $notebook->days_remaining->diffForHumans() }}</span> on
                    {{ $notebook->deleted_at->add('days', 30)->toFormattedDateString() }}</p>
            </div>
        </div>

        <form
            action="{{ route('notebooks.restore', $notebook) }}"
            method="POST"
        >
            @method('PATCH')
            @csrf

            <x-buttons.ghost
                size="sm"
                class="bg-orange-500 border border-transparent rounded-md font-semibold text-orange-50 hover:bg-orange-400 active:bg-orange-600"
            >
                Restore Notebook
            </x-buttons.ghost>
        </form>
    </div>
</div>
