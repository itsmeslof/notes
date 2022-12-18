<div
    class="fixed top-0 bottom-0 left-0 right-0 bg-black/30 flex justify-center items-start py-10"
    {{ $attributes }}
>
    <div class="w-full flex flex-col space-y-4 justify-center items-center">
        <div class="lds-default">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
