<?php

namespace App\View\Components\Period;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Week extends Component
{
    public array $daysInAWeek = [
        'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.period.week');
    }
}
