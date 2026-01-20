<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class VehicleForm extends Component
{
    public $vehicle;
    public $stations;
    /**
     * Create a new component instance.
     */
     public function __construct($vehicle = null, $stations = [])
    {
        $this->vehicle = $vehicle;
        $this->stations = $stations;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vehicle-form');
    }
}
