<?php

namespace App\View\Components\Period;

use App\Actions\MonthPeriod;
use App\Actions\Period;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Month extends Component
{
    public Period $period;
    public array $daysInAWeek = [
        'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
    ];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->period = new MonthPeriod();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.period.month');
    }
}
