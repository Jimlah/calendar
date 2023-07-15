@props(['currentDate'])
<div class="h-full w-full flex flex-col items-start justify-start">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="grid grid-cols-7 h-fit w-full">
        @foreach($daysInAWeek as $day)
            <p class="text-right px-2 py-1">{{$day}}</p>
        @endforeach
    </div>
    <div class="flex items-center justify-center w-full h-full">
        <div class="grid grid-cols-7 border border-collapse h-full w-full auto-cols-fr grid-flow-row">
            @foreach($period->matrix() as $week)
                @foreach($week as $date)
                    <x-period.month.day :date="$date" :current="$currentDate" />
                @endforeach
            @endforeach
        </div>
    </div>
</div>
