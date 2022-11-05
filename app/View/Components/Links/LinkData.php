<?php

namespace App\View\Components\Links;

class LinkData
{
    /**
     * Base classes shared across all links;
     *
     * @var string
     */
    const BASE_CLASSES = 'inline-flex items-center focus:outline-none focus-visible:border-emerald-300 focus-visible:ring ring-emerald-300 transition ease-in-out duration-150';

    /**
     * The css classes for links styled as buttons.
     *
     * @var array<string, string>
     */
    const BTN_SIZE_CLASSES = [
        'sm' => 'text-sm px-3 py-1',
        'md' => 'text-md px-6 py-2',
        'lg' => 'text-lg px-9 py-3',
    ];

    /**
     * The css classes for links of the default anchor style.
     *
     * @var array<string, string>
     */
    const ANCHOR_SIZE_CLASSES = [
        'sm' => 'text-sm',
        'md' => 'text-md',
        'lg' => 'text-lg'
    ];

    /**
     * Get the class string for button-styled links of the specified size.
     *
     * @param string $size
     * @return string
     */
    public static function getClassesForSize(string $size): string
    {
        return static::BTN_SIZE_CLASSES[$size] ?? static::BTN_SIZE_CLASSES['md'];
    }

    /**
     * Get the class string for anchor-styled links of the specified size.
     *
     * @param string $size
     * @return string
     */
    public static function getAnchorClassesForSize(string $size): string
    {
        return static::ANCHOR_SIZE_CLASSES[$size] ?? static::ANCHOR_SIZE_CLASSES['md'];
    }
}
