<x-admin.site-settings.setting-card class="flex justify-between space-x-10 items-center">
    <div>
        <h3 class="text-gray-600 font-semibold text-lg">User Registration</h3>
        <p class="text-gray-400 text-sm">
            Enable or disable user registration. When disabled, you will still be able to create new users from the
            admin / users page, and existing users will still be able to login to their account.
        </p>
    </div>
    <x-forms.select-input
        class="min-w-[200px] text-sm px-3 py-1"
        name="enable_user_registration"
        id="enable_user_registration"
    >
        <option
            value="1"
            {{ $settings['enable_user_registration'] ? 'selected' : '' }}
        >
            Enabled
        </option>
        <option
            value="0"
            {{ !$settings['enable_user_registration'] ? 'selected' : '' }}
        >
            Disabled
        </option>
    </x-forms.select-input>
</x-admin.site-settings.setting-card>
