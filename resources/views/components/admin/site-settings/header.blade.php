<div class="w-full flex justify-between items-center">
    <x-dashboard-heading-text>Manage Site Settings</x-dashboard-heading-text>
    <x-buttons.primary
        size="sm"
        x-data="{}"
        @click="$dispatch('update-site-settings')"
    >
        Update Settings
    </x-buttons.primary>
</div>
