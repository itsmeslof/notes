<?php

namespace App\View\Components\Buttons;

class Danger extends BaseButton
{
    public function getClasslist(): string
    {
        return 'bg-rose-500 border border-transparent rounded-md font-semibold text-rose-50 hover:bg-rose-400 active:bg-rose-600';
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getClasslistForSize($size);
    }
}
