@props(['currentDate', 'events'])
<div class="h-full w-full flex flex-col items-start justify-start">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="grid grid-cols-7 h-fit w-full gap-0.5 border-b-2">
        @foreach($daysInAWeek as $day)
            <p class="text-right px-2 py-1">{{$day}}</p>
        @endforeach
    </div>
    <div class="flex items-center justify-center w-full h-full">
        <div class="grid grid-cols-7 h-full w-full auto-cols-fr gap-0.5 grid-flow-row bg-gray-200">
            @foreach($period->matrix() as $week)
                @foreach($week as $date)
                    <x-period.month.day :date="$date" :current="$currentDate" :events="$events->where('start_at', $date)" />
                @endforeach
            @endforeach
        </div>
    </div>
</div>
