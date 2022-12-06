@props(['disabled' => false])

<select
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' =>
            'text-gray-900 rounded-md shadow-sm bg-white border-gray-300 focus:border-emerald-300 focus:ring focus:ring-emerald-300 focus:ring-opacity-50',
    ]) !!}
>

    {{ $slot }}

</select>
