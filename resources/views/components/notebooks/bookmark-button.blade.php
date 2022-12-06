@props(['notebook' => null])

<form
    action="{{ route('notebooks.bookmark.update', $notebook) }}"
    class="flex"
    method="POST"
>
    @csrf
    @method('PATCH')

    <input
        type="hidden"
        name="bookmarked"
        value="{{ $notebook->bookmarked ? '0' : '1' }}"
    >

    <x-buttons.bookmark
        size="sm"
        :bookmarked="$notebook->bookmarked"
    />
</form>
