<?php

namespace App\View\Components\Breadcrumbs;

use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Get the class list for the label.
     *
     * @return string
     */
    public function getClasslist(): string
    {
        return 'text-md text-gray-500';
    }

    /**
     * The full computed class list.
     */
    public $computedClasses = '';

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->computedClasses = "{$this->getClassList()}";

        return view('components.breadcrumbs.label');
    }
}
