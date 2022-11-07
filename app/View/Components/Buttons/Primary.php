<?php

namespace App\View\Components\Buttons;

class Primary extends BaseButton
{
    const STYLES = 'bg-emerald-500 border border-transparent rounded-md font-semibold text-emerald-50 hover:bg-emerald-400 active:bg-emerald-600';

    public function getClasslist(): string
    {
        return self::STYLES;
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getClasslistForSize($size);
    }
}
