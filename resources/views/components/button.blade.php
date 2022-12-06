<button {{ $attributes->merge(['class' => $computedClasses]) }}>
    {{ $slot }}
</button>
