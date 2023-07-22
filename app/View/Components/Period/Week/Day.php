<?php

namespace App\View\Components\Period\Week;

use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Day extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public CarbonImmutable $currentDate,
        public CarbonImmutable $date,
        public Collection|array $events = new Collection()
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.period.week.day');
    }
}
