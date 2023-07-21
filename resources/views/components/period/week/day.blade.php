@props(['events', 'date'])
<button class="h-full focus:outline-none text-center w-full bg-white relative flex items-start justify-start overflow-hidden"
        x-contextmenu:trigger.day="'{{$date}}'"
>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    <span
        @class([
        "absolute top-0 right-0 m-1 rounded-full w-6 h-6 flex items-center justify-center text-sm",
        "text-white bg-blue-500" => $date->isToday(),
        "opacity-30" => !$date->between($currentDate->startOfMonth(), $currentDate->endOfMonth())
        ])
    >
        <span>{{$date->day}}</span>
    </span>
    <div class="inline-flex items-start justify-start mt-6 flex-col h-fit space-y-0.5 w-full py-2" x-id="['event-input']">
        @foreach($events as $event)
            <x-period.month.event :event="$event" />
        @endforeach
    </div>
</button>
