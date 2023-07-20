<x-pop-over ::listeners="['edit-event']" @onload="$wire.edit(props.id)" @onclose="$wire.submit(); $wire.close();">
    {{-- Be like water. --}}
    @if($event)
        <form class="text-xs flex flex-col items-start justify-start divide-y" wire:submit="submit" x-id="['event-input']">
            <label class="px-4 py-1 w-full inline-block" :for="$id('text-input')">
                <span class="sr-only">Event Name</span>
                <textarea wire:model.blur="event.name" :id="$id('text-input')" x-autosize type="text" class="border-none h-fit text-lg inline-block focus:outline-none focus:ring-none caret-black resize-none" ></textarea>
            </label>
            <div class="px-4 py-1 w-full">
                <div x-data="{isOpen: false}" @click.outside="isOpen=false">
                    <p class="whitespace-nowrap" x-show="!isOpen" @click="isOpen=true">
                        {{ $event->start_at?->toFormattedDateString() }}
                        @if(!$event->is_all_day)
                            {{$event->start_at?->format("H A")}} to {{$event->end_at?->format("H A")}}
                        @endif
                    </p>
                    <div x-show="isOpen" class="flex items-start justify-start flex-col space-y-2">
                        <label class="flex items-center justify-start w-full" >
                            <span class="text-xs inline-block text-right mr-2 w-1/3 flex-none">All Day:</span>
                            <span class="w-full">
                                <input name="is_all_day" type="checkbox" class="focus:outline-none ring-0" wire:model.blur="event.is_all_day" />
                            </span>
                        </label>
                        <label class="flex items-center justify-start" >
                            <span class="text-xs inline-block text-right mr-2 w-1/3 flex-none">Starts:</span>
                            <input name="start_at" type="datetime-local" class="focus:outline-none ring-0 w-full" wire:model.blur="event.start_at"/>
                        </label>
                        <label class="flex items-center justify-start" >
                            <span class="text-xs inline-block text-right mr-2 w-1/3 flex-none">Ends:</span>
                            <input name="ends_at" type="datetime-local" class="focus:outline-none ring-0 w-full" wire:model.blur="event.end_at" />
                        </label>
                    </div>
                </div>
            </div>
            <div class="px-4 py-1 w-full">
                Final
            </div>
        </form>
    @endif

</x-pop-over>
