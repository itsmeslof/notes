<button {{ $attributes->merge(['class' => $computedClasses]) }}>
    @if ($bookmarked)
        Bookmarked
    @else
        Bookmark
    @endif
</button>
