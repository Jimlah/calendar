<?php

namespace App\Http\Livewire;

use App\Actions\MonthPeriod;
use App\Actions\Period;
use Livewire\Component;

class CalendarRoot extends Component
{
    public string $currentDate;

    public function mount(): void
    {
        $this->currentDate = now();
    }

    public function create()
    {

    }

    public function paste()
    {

    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.calendar-root');
    }
}
