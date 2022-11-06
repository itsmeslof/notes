<?php

namespace App\View\Components\Buttons;

class Ghost extends BaseButton
{
    public function getClasslist(): string
    {
        return 'border border-transparent rounded-md font-semibold';
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getClasslistForSize($size);
    }
}
