@props(['event'])
<a href="#"
   x-on:click.prevent="$dispatch('edit-event', {id:'{{$event->id}}'})"
   class="text-xs bg-blue-400 px-1 whitespace-nowrap overflow-hidden w-full text-left py-0.5 rounded text-white flex items-center justify-between space-x-1"
   x-contextmenu:trigger.event="'{{$event->id}}'"
   @event-created-{{$event->id}}.window="$dispatch('edit-event', {id:'{{$event->id}}'})"
>
    @if($event->is_all_day)
        <span class="inline-block w-2 aspect-square bg-blue-900 rounded-full" ></span>
    @endif
    <p class="text-ellipsis overflow-hidden">
        {{$event->name}}
    </p>
    <span>{{ $event->start_at->format("H A") }}</span>
</a>
