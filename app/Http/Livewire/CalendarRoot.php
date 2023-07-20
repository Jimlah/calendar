<?php

namespace App\Http\Livewire;

use App\Actions\DayPeriod;
use App\Actions\MonthPeriod;
use App\Actions\Period;
use App\Actions\WeekPeriod;
use App\Actions\YearPeriod;
use App\Factories\PeriodFactory;
use App\Interfaces\HasMatrix;
use App\Models\Event;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class CalendarRoot extends Component
{
    public string $currentDate;

    protected PeriodFactory $period;

    public string $currentPeriod;

    public string $copiedEventId;

    public bool $isCut = false;

    protected $listeners = [
        'calendar-root-refresh' => '$refresh',
    ];

    public function boot(PeriodFactory $period): void
    {
        $this->currentDate = now();
        $this->period = $period;

    }

    public function updatedCurrentPeriod(): void
    {
        $period = match ($this->currentPeriod) {
            'day' => PeriodFactory::DAY_PERIOD,
            'week' => PeriodFactory::WEEK_PERIOD,
            'month' => PeriodFactory::MONTH_PERIOD,
            'year' => PeriodFactory::YEAR_PERIOD,
        };
        $this->period->setPeriod($period);
    }


    public function create($date): void
    {
        $date = CarbonImmutable::parse($date);
        $event = Event::factory()->create(['name' => 'New Event ' . $date->toString(), 'start_at' => $date, 'end_at' => $date->add(CarbonInterval::hour())]);
        $this->emit("event-created", ['id' => $event->id]);
    }

    public function paste($id): void
    {
        $eventTobeReplicated = Event::query()->find($this->copiedEventId);
        $event = $eventTobeReplicated->replicate();
        $date = !Str::isUlid($id) ? CarbonImmutable::parse($id) : Event::query()->find($id)->start_at;
        $event->start_at = $date;
        $event->end_at = $date->add(CarbonInterval::hour());
        $event->save();

        if($this->isCut){
            $eventTobeReplicated->delete();
        }

        $this->isCut = false;
        unset($this->copiedEventId);
    }

    public function copy($id): void
    {
        $this->copiedEventId = $id;
        $this->isCut = false;
    }

    public function duplicate($id): void
    {
        Event::query()->find($id)->replicate()->save();
    }

    public function delete($id): void
    {
        Event::query()->find($id)->delete();
    }

    public function cut($id): void
    {
        $this->copiedEventId = $id;
        $this->isCut = true;

    }



    public function render(): View
    {
        $events = Event::query()
            ->whereBetween('start_at', [$this->period->make()->getStart(), $this->period->make()->getEnd()])
            ->when($this->isCut, fn (Builder $query)=>$query->whereNot('id', $this->copiedEventId))
            ->get();
        $periods = $this->period->make()->matrix();
        return view('livewire.calendar-root', compact('events'));
    }
}
