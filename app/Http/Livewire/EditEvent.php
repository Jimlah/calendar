<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditEvent extends Component
{
    public Event $event;

    protected $rules = [
        'event.name' => 'required',
    ];

    public function mount(): void
    {
        $this->event = new Event();
    }

    public function updated($field):void
    {
        $this->validateOnly($field);
        $this->event->save();
        $this->emitUp('calendar-root-refresh');
    }

    public function submit(): void
    {
        $this->validate();
        $this->event->save();
        $this->emitUp('calendar-root-refresh');
    }

    public function close(): void
    {
        $this->event = new Event();
        $this->emitUp('calendar-root-refresh');
    }

    public function edit($id): void
    {
        $this->event = Event::query()->find($id);
    }

    public function render(): View
    {
        return view('livewire.edit-event');
    }
}
