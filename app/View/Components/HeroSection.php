<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class HeroSection extends Component
{
      public $title;
    public $subtitle;
    public $buttons;
    public $bgClass;
    public $overlayClass;
    public $titleClass;
    public $subtitleClass;

    public function __construct(
        $title = null,
        $subtitle = null,
        $buttons = [],
        $bgClass = null,
        $overlayClass = null,
        $titleClass = null,
        $subtitleClass = null
    )
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->buttons = $buttons;
        $this->bgClass = $bgClass;
        $this->overlayClass = $overlayClass;
        $this->titleClass = $titleClass;
        $this->subtitleClass = $subtitleClass;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-section');
    }
}
