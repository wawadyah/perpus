<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RentLogTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $rentlog;
    public function __construct($rentlog)
    {
        $this->rentlog = $rentlog;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rent-log-table');
    }
}
