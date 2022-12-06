<?php

namespace App\View\Components\Breadcrumbs;

class ActivePageLabel extends Label
{
    /**
     * Get the class list for the specific link type.
     *
     * @return string
     */
    public function getClasslist(): string
    {
        return 'text-md text-emerald-500';
    }
}
