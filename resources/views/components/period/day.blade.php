@props(['currentDate', 'events', 'periods'])
<div class="w-full flex items-start justify-start flex-col px-4 h-full overflow-hidden">
    <div class="px-4 flex-none border-b-2 w-full">
        <p>all-day</p>
    </div>
    <div class="py-2 w-full h-full">
        <div class="w-full relative px-4 flex-grow overflow-y-auto h-full">
            <x-timeline />
            @foreach($periods as $period)
                @foreach($period as $hour)
                    <div class="h-[8.3333%] w-full relative border-t last:border-b">
                        <span class="absolute top-0 left-0 -mt-3 bg-white inline-block pr-2">{{ $hour->format('g A') }}</span>

                        @if($loop->last)
                            <span class="absolute bottom-0 left-0 -mb-3 bg-white inline-block pr-2">{{ $period->first()->format('g A') }}</span>
                        @endif
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div>
