@props(['currentDate', 'events', 'periods'])
@php
    $periods->prepend($periods->first());
@endphp
<div class="w-full flex items-start justify-start flex-col px-4 h-full overflow-hidden">
    <div class="px-4 flex-none border-b-2 w-full">
        <p>all-day</p>
    </div>
    <div class="py-2 w-full h-full">
        <div class="w-full relative px-4 flex-grow overflow-y-auto h-full">
            <div class="grid grid-rows-[repeat(24,_1fr)] grid-cols-[50px_repeat(7,_1fr)] h-[200%] w-full grid-flow-col gap-0.5 bg-gray-200">
                @foreach($periods as $week)
                    @foreach($week as $date)
                        <x-period.month.day :date="$date" :current="$currentDate" :events="[]" />
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div>
