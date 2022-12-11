<div>
    <div @update-site-settings.window="document.querySelector('#settingsForm').submit()">
        <form
            id="settingsForm"
            class="flex flex-col space-y-4"
            action="{{ route('admin.site-settings.update') }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <x-admin.site-settings.user-registration :settings="$settings" />
            <x-admin.site-settings.show-home-page :settings="$settings" />
        </form>
    </div>
</div>
