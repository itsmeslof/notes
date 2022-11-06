<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

abstract class BaseButton extends Component
{
    /**
     * Base classes shared across all buttons;
     *
     * @var string
     */
    const BASE_CLASSES = 'inline-flex items-center rounded-md focus:outline-none focus-visible:border-emerald-300 focus-visible:ring ring-emerald-300 transition ease-in-out duration-150';

    /**
     * The css classes for buttons styled as buttons.
     *
     * @var array<string, string>
     */
    const BTN_SIZE_CLASSES = [
        'sm' => 'text-sm px-3 py-1',
        'md' => 'text-md px-6 py-2',
        'lg' => 'text-lg px-9 py-3',
    ];

    /**
     * The css classes for buttons styled as links.
     *
     * @var array<string, string>
     */
    const ANCHOR_SIZE_CLASSES = [
        'sm' => 'text-sm',
        'md' => 'text-md',
        'lg' => 'text-lg'
    ];

    /**
     * Get the class list for the specific button type.
     *
     * @return string
     */
    abstract public function getClasslist(): string;

    /**
     * Get the class list relating to element size for the specific button type.
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
        $baseButtonClasslist = static::BASE_CLASSES;
        $buttonTypeClasslist = $this->getClasslist();
        $sizeClasslist = $this->getSizeClasslist($size);

        $this->computedClasses = "{$baseButtonClasslist} {$buttonTypeClasslist} {$sizeClasslist}";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }

    /**
     * Get the class string for button-styled buttons of the specified size.
     *
     * @param string $size
     * @return string
     */
    public static function getClasslistForSize(string $size): string
    {
        return static::BTN_SIZE_CLASSES[$size] ?? static::BTN_SIZE_CLASSES['md'];
    }

    /**
     * Get the class string for link-styled buttons of the specified size.
     *
     * @param string $size
     * @return string
     */
    public static function getAnchorClasslistForSize(string $size): string
    {
        return static::ANCHOR_SIZE_CLASSES[$size] ?? static::ANCHOR_SIZE_CLASSES['md'];
    }
}
