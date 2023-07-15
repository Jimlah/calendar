<?php

namespace App\View\Components\Period\Month;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Day extends Component
{
    public CarbonImmutable $currentDate;
    /**
     * Create a new component instance.
     */
    public function __construct(public CarbonImmutable $date, public string $current)
    {
        $this->currentDate = CarbonImmutable::parse($this->current);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.period.month.day');
    }
}
