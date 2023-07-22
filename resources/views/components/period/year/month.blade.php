@props(['period', 'events', 'currentDate'])
<div class="w-full h-full">
    <h3 class="text-xl mb-1 text-red-500">{{ $period?->get('15')?->format('F') }}</h3>
    <div class="flex items-start justify-start w-full h-full">
        <div class="grid grid-cols-7 grid-rows-5 grid-flow-row text-xs gap-1 w-full">
            <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
            @foreach(now()->startOfWeek(\Carbon\Carbon::SUNDAY)->toPeriod(now()->endOfWeek(\Carbon\Carbon::SATURDAY))->toArray() as $day)
                <p class="text-center">
                    {{$day->format('D')}}
                </p>
            @endforeach
            @foreach($period as $day)
                <x-period.year.month.day :day="$day" :currentDate="$currentDate" :period="$period" />
            @endforeach
        </div>
    </div>
</div>
