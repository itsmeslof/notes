<?php

namespace App\View\Components\Buttons;

class Primary extends BaseButton
{
    public function getClasslist(): string
    {
        return 'bg-emerald-500 border border-transparent rounded-md font-semibold text-emerald-50 hover:bg-emerald-400 active:bg-emerald-600';
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getClasslistForSize($size);
    }
}
