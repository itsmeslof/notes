<?php

namespace App\View\Components\Links;

use Illuminate\View\Component;

class Primary extends Component
{
    /**
     * The classes for this link.
     *
     * @var string
     */
    public $classes = 'bg-emerald-500 rounded-md font-semibold text-emerald-50 hover:bg-emerald-400 active:bg-emerald-600';

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
