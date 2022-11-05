<?php

namespace App\View\Components\Links;

class Anchor extends BaseLink
{
    public function getClasslist(): string
    {
        return 'underline text-gray-500 hover:text-gray-900';
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseLink::getAnchorClasslistForSize($size);
    }
}
