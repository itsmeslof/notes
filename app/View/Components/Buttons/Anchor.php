<?php

namespace App\View\Components\Buttons;

class Anchor extends BaseButton
{
    public function getClasslist(): string
    {
        return 'underline text-gray-500 hover:text-gray-900';
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getAnchorClasslistForSize($size);
    }
}
