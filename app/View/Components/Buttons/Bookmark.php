<?php

namespace App\View\Components\Buttons;

class Bookmark extends BaseButton
{
    public $bookmarked;

    /**
     * The styles when the button is considered 'active'.
     *
     * @var string
     */
    const BOOKMARKED_STYLES = 'bg-white border border-pink-300 rounded-md font-semibold text-pink-500 hover:border-pink-400 hover:text-pink-600 active:text-pink-700 active:border-pink-300 active:bg-pink-300 hover:shadow-sm';

    /**
     * The styles when the button is considered 'inactive'.
     *
     * @var string
     */
    const UNBOOKMARKED_STYLES = Secondary::STYLES;

    public function __construct($bookmarked = false, $size = 'md')
    {
        $this->bookmarked = $bookmarked;
        parent::__construct($size);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.bookmark');
    }

    public function getClasslist(): string
    {
        return $this->bookmarked ? self::BOOKMARKED_STYLES : self::UNBOOKMARKED_STYLES;
    }

    public function getSizeClasslist(string $size): string
    {
        return BaseButton::getClasslistForSize($size);
    }
}
