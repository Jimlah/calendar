@props(['currentDate', 'events', 'periods'])
<div class="h-full w-full flex flex-col items-start justify-start">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="grid grid-cols-7 h-fit w-full gap-0.5 border-b border-[#4d4d4d]">
        @foreach($daysInAWeek as $day)
            <p class="text-right px-2 py-1">{{$day}}</p>
        @endforeach
    </div>
    <div class="flex items-center justify-center w-full h-full">
        <div class="grid grid-cols-7 h-full w-full auto-cols-fr gap-[1px] grid-flow-row bg-[#4d4d4d]">
            @foreach($periods as $week)
                @foreach($week as $date)
                    <x-period.month.day :date="$date" :currentDate="$currentDate" :events="[]" />
                @endforeach
            @endforeach
        </div>
    </div>
</div>
