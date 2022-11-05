<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class Secondary extends Component
{
    /**
     * The classes for this link.
     *
     * @var string
     */
    public $classes = 'bg-white border border-gray-300 rounded-md font-semibold text-gray-500 hover:border-gray-400 hover:text-gray-600 active:text-gray-700 active:border-gray-300 active:bg-gray-300 hover:shadow-sm';

    /**
     * The full computed class list.
     *
     * @var string
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
        $baseLinkClasses = LinkData::BASE_CLASSES;
        $sizeClasses = LinkData::getClassesForSize($size);

        $this->computedClasses = "{$baseLinkClasses} {$this->classes} {$sizeClasses}";
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
}
