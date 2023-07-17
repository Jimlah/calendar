<x-pop-over ::listeners="['edit-event']" @onload="$wire.edit(props.id)" @close="$wire.reset()">
    {{-- Be like water. --}}
    <form class="text-xs flex flex-col items-start justify-start divide-y" wire:submit.prevent="submit">
        <div class="px-4 py-1 w-full">
            <input wire:model="event.name" type="text" class="border-none focus:outline-none focus:ring-none caret-black" >
        </div>
        <div class="px-4 py-1 w-full">
            Good
        </div>
        <div class="px-4 py-1 w-full">
            Final
        </div>

    </form>
</x-pop-over>
