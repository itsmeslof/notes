<?php

namespace App\View\Components\Buttons;

/**
 * Ghost button with no color styling.
 */
class Ghost extends BaseButton
{
    public function getClasslist(): string
    {
        return 'font-semibold rounded-md';
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getClasslistForSize($size);
    }
}
