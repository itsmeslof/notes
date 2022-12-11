<?php

if (!function_exists('settings')) {
    function settings()
    {
        return app(App\Settings::class);
    }
}
