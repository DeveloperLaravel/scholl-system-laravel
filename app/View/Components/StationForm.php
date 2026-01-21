<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StationForm extends Component
{
       public $action;
    public $method;
    public $fields;
    public $title;
    public $buttonText;

    public function __construct($action, $fields = [], $title = null, $buttonText = null, $method = 'POST')
    {
        $this->action = $action;
        $this->fields = $fields;
        $this->title = $title;
        $this->buttonText = $buttonText;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.station-form');
    }
}
