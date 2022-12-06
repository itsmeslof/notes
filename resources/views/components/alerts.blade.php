@props(['errorBag' => $errors, 'status' => session('status')])

@if ($errorBag->any() || $status)
    <div class="space-y-4">
        <x-alerts.errors :errors="$errorBag" />
        <x-alerts.status :status="$status" />
    </div>
@endif
