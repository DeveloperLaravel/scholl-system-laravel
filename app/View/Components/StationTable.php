<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StationTable extends Component
{
     public $stations;

    public function __construct($stations)
    {
        $this->stations = $stations;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.station-table');
    }
}
