@props(['size' => 'xl'])

<h2 {{ $attributes->merge(['class' => "font-semibold text-$size text-gray-800 leading-tight"]) }}>
    {{ $slot }}
</h2>
