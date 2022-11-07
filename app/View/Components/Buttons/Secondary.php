<?php

namespace App\View\Components\Buttons;

class Secondary extends BaseButton
{
    const STYLES = 'bg-white border border-gray-300 rounded-md font-semibold text-gray-500 hover:border-gray-400 hover:text-gray-600 active:text-gray-700 active:border-gray-300 active:bg-gray-300 hover:shadow-sm';

    public function getClasslist(): string
    {
        return self::STYLES;
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getClasslistForSize($size);
    }
}
