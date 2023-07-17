<x-drop-down-menu class="fixed" x-contextmenu:contextmenu.day>
    <!-- An unexamined life is not worth living. - Socrates -->
        <x-drop-down-link x-on:click.prevent="$wire.create(props)">New Event</x-drop-down-link>
        <x-drop-down-link x-on:click.prevent="$wire.paste(props)" x-bind:data-disabled="!$wire.copiedEventId">
            Paste Event
        </x-drop-down-link>

</x-drop-down-menu>
