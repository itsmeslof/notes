<x-app-layout>

    <x-slot name="alerts">
        <x-alerts />
    </x-slot>

    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <x-breadcrumbs.notebook-share :$notebook />

            <x-links.primary
                size="sm"
                :href="route('notebooks.share.create', [$notebook])"
            >
                Create New Share Link
            </x-links.primary>
        </div>
    </x-slot>

    <div class="space-y-10">
        <x-dashboard-heading-text>
            Active Share Links
        </x-dashboard-heading-text>

        <x-notebooks.share.active-links-list :$activeShareLinks />
    </div>

</x-app-layout>
