@props(['currentDate', 'events', 'periods'])
<div class="w-full flex items-start justify-start flex-col px-4 h-full overflow-hidden">
    <div class="px-4 flex-none border-b-2 w-full">
        <p>all-day</p>
    </div>
    <div class="py-2 w-full h-full">
        <div class="w-full relative px-4 flex-grow overflow-y-auto h-full">
            <span class="absolute w-full inline-block left-0 z-30 border-t border-t-red-600" x-time>
                <span x-text='$data.time?.toLocaleTimeString("en-us", { hour: "2-digit", minute: "2-digit"}) ?? null' class="absolute text-red-600 top-0 left-0 text-xs -mt-2 bg-white inline-block whitespace-nowrap"></span>
            </span>
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
