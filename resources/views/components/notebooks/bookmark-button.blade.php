@props(['notebook' => null])

@php
    $route = $notebook->bookmarked ? 'notebooks.bookmark.destroy' : 'notebooks.bookmark.store';
    $method = $notebook->bookmarked ? 'DELETE' : 'POST';
@endphp

@if ($notebook)
    <form
        action="{{ route($route, $notebook) }}"
        class="flex"
        method="POST"
    >
        @csrf
        @method($method)

        <x-buttons.bookmark
            size="sm"
            :bookmarked="$notebook->bookmarked"
        />
    </form>
@endif
