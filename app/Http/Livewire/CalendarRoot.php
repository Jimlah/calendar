<?php

namespace App\Http\Livewire;

use App\Actions\MonthPeriod;
use App\Actions\Period;
use App\Models\Event;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CalendarRoot extends Component
{
    public string $currentDate;

    public string $copiedEventId;

    public bool $isCut = false;

    protected $listeners = [
        'calendar-root-refresh' => '$refresh',
    ];

    public function mount(): void
    {
        $this->currentDate = now();
    }

    public function create($date): void
    {
        $date = CarbonImmutable::parse($date);
        Event::factory()->create(['name' => 'New Event ' . $date->toString(), 'start_at' => $date, 'end_at' => $date->add(CarbonInterval::hour())]);
    }

    public function paste($id): void
    {
        $eventTobeReplicated = Event::query()->find($this->copiedEventId);
        $event = $eventTobeReplicated->replicate();
        $date = CarbonImmutable::parse($id) ?? Event::query()->find($id)->start_at;
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
        $events = Event::query()->whereMonth('start_at', now()->month)
            ->when($this->isCut, fn (Builder $query)=>$query->whereNot('id', $this->copiedEventId))
            ->get();
        return view('livewire.calendar-root', compact('events'));
    }
}
