@props(['currentDate', 'events', 'periods'])
@php
    $periods->prepend($periods->first());
@endphp
<div class="w-full flex items-start justify-start flex-col px-4 h-full overflow-hidden">
    <div class="w-full px-4 mb-2 flex-none">
        <div class="grid grid-cols-[50px_repeat(7,_1fr)] w-full gap-[1px]">
            @foreach($periods as $period)
                <div class="">
                    @if($loop->first)
                        <span></span>
                    @else
                        <span class="flex items-center justify-center space-x-3">
                            <span>{{ $period->first()->format('D') }}</span>
                            <span class="flex items-center justify-center p-1 rounded-full w-6 h-6 data-[is-today=true]:bg-red-600" data-is-today="{{ $period->first()->isToday() ? 'true' : 'false' }}">
                                <span>{{ $period->first()->day }}</span>
                            </span>
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-full px-4 flex-none">
        <div class="grid border-y border-[#4d4d4d] grid-cols-[50px_repeat(7,_1fr)] w-full gap-[1px] bg-[#4d4d4d]">
            @foreach($periods as $period)
                <div class="bg-[#1d1f20]">
                    @if($loop->first)
                        <span>all-day</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-full h-full flex-grow px-4 overflow-y-auto">
        <div class="grid grid-rows-[repeat(24,_1fr)] grid-cols-[50px_repeat(7,_1fr)] w-full h-[200%] grid-flow-col gap-[1px] bg-[#4d4d4d]">
            @foreach($periods as $week)
                @foreach($week as $date)
                    @if($loop->parent->iteration > 1)
                        <x-period.week.day :date="$date" :current="$currentDate" :events="[]" />
                    @else
                        <div class="h-full focus:outline-none text-xs text-center w-full bg-[#1d1f20] data-[is-weekend=true]:bg-[#272829] relative flex items-start justify-start overflow-hidden">
                            {{ $date->format("g A") }}
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div>
