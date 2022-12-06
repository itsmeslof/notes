<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

abstract class BaseLink extends Component
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
     * Get the class list for the specific link type.
     *
     * @return string
     */
    abstract public function getClasslist(): string;

    /**
     * Get the class list relating to element size for the specific link type.
     *
     * @param string $size
     * @return string
     */
    abstract public function getSizeClasslist(string $size): string;

    /**
     * The full computed class list.
     */
    public $computedClasses = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $size = 'md'
    ) {
        $baseLinkClasslist = static::BASE_CLASSES;
        $linkTypeClasslist = $this->getClasslist();
        $sizeClasslist = $this->getSizeClasslist($size);

        $this->computedClasses = "{$baseLinkClasslist} {$linkTypeClasslist} {$sizeClasslist}";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.link');
    }

    /**
     * Get the class string for button-styled links of the specified size.
     *
     * @param string $size
     * @return string
     */
    public static function getClasslistForSize(string $size): string
    {
        return static::BTN_SIZE_CLASSES[$size] ?? static::BTN_SIZE_CLASSES['md'];
    }

    /**
     * Get the class string for button-styled links of the specified size.
     *
     * @param string $size
     * @return string
     */
    public static function getAnchorClasslistForSize(string $size): string
    {
        return static::ANCHOR_SIZE_CLASSES[$size] ?? static::ANCHOR_SIZE_CLASSES['md'];
    }
}
