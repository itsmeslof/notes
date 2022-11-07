<button {{ $attributes->merge(['class' => $computedClasses]) }}>
    @if ($bookmarked)
        <x-svg.bookmarked-icon class="mr-2" />
        Bookmarked
    @else
        <x-svg.bookmark-outline-icon class="mr-2" />
        Bookmark
    @endif
</button>
