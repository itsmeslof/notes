<a
    {{ $attributes->merge(['class' => 'inline-flex items-center px-6 py-2 bg-emerald-500 rounded-md font-semibold text-md text-emerald-50 hover:bg-emerald-400 active:bg-emerald-600 focus:outline-none focus:ring ring-emerald-200 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
