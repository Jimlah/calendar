@props(['currentDate', 'events', 'periods'])

<div class="w-full h-full flex items-start justify-start">
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div class="w-full h-full flex items-start flex-grow justify-start px-10">
        <div class="grid grid-cols-4 grid-rows-3 grid-flow-row gap-5 h-full w-full">
            @foreach($periods as $period)
                <x-period.year.month :currentDate="$currentDate" :events="$events" :period="$period" />
            @endforeach
        </div>
    </div>
</div>
