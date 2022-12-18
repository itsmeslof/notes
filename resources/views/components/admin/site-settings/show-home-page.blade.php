<x-admin.site-settings.setting-card class="flex justify-between space-x-10 items-center">
    <div>
        <h3 class="text-gray-600 font-semibold text-lg">Home Page
        </h3>
        <p class="text-gray-400 text-sm">
            When enabled, the project home page will be shown with information regarding the project, and links to the
            github and project website. When disabled, all requests made to the root domain ({{ config('app.url') }})
            will
            redirect to the user dashboard.
        </p>
    </div>
    </h3>
    <x-forms.select-input
        class="min-w-[200px] text-sm px-3 py-1"
        name="show_home_page"
        id="show_home_page"
    >
        <option
            value="1"
            {{ $settings['show_home_page'] ? 'selected' : '' }}
        >
            Enabled
        </option>
        <option
            value="0"
            {{ !$settings['show_home_page'] ? 'selected' : '' }}
        >
            Disabled
        </option>
    </x-forms.select-input>
</x-admin.site-settings.setting-card>
