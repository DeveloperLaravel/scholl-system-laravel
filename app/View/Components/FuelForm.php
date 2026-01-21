<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FuelForm extends Component
{
   public string $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }
  
    
    public function render(): View|Closure|string
    {
        return view('components.fuel-form');
    }
}
