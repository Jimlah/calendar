<x-drop-down-menu x-contextmenu:contextmenu.event>
    <!-- An unexamined life is not worth living. - Socrates -->
            <x-drop-down-link x-on:click.prevent="$wire.create(props); __isopen=false">Get info</x-drop-down-link>
            <x-drop-down-sub-menu>
                Calendar
            </x-drop-down-sub-menu>
            <x-drop-down-hr-line />
            <x-drop-down-link x-on:click.prevent="$wire.delete(props); __isopen=false" >Delete</x-drop-down-link>
            <x-drop-down-link x-on:click.prevent="$wire.cut(props); __isopen=false">Cut</x-drop-down-link>
            <x-drop-down-link x-on:click.prevent="$wire.copy(props);__isopen=false" >Copy</x-drop-down-link>
            <x-drop-down-link x-on:click.prevent="$wire.paste(props);__isopen=false" x-bind:data-disabled="!$wire.copiedEventId">Paste</x-drop-down-link>
            <x-drop-down-link x-on:click.prevent="$wire.duplicate(props);__isopen=false">Duplicate</x-drop-down-link>
</x-drop-down-menu>
