@props(['errors'])

@if ($errors->any())
    <div class="space-y-4">
        @foreach ($errors->all() as $error)
            <div
                {{ $attributes->merge(['class' => 'mb-4 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md']) }}>
                <div class="flex">
                    <svg
                        class="fill-current h-6 w-6 text-red-500 mr-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                        />
                    </svg>
                    <p class="font-bold">{{ $error }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif
