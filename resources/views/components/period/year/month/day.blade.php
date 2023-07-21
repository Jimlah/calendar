@props(['day', 'currentDate', 'period'])
@php
    $date =\Carbon\CarbonImmutable::parse($day);
@endphp
<button class="data-[is-today=true]:bg-red-500 data-[is-weekend=true]:text-[#999a9b] data-[is-not-month=true]:text-[#999a9b]/30 flex items-center justify-center w-5 h-5 rounded-full"
        data-is-today="{{ $date->isToday() ? 'true' : 'false' }}"
        data-is-weekend="{{$date->isWeekend() ? 'true' : 'false' }}"
        data-is-not-month="{{!$date->isSameMonth(\Carbon\CarbonImmutable::parse($period->get(15))) ? 'true' : 'false' }}"

>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    <span>{{ $date->day }}</span>
</button>
