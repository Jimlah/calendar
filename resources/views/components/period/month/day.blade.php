<button class="inline-block h-full focus:outline-none text-center w-full border border-collapse relative"
        x-contextmenu:trigger.day
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
</button>
