<div class="bg-white rounded z-[999] shadow-md text-sm border border-opacity-50 p-1 " x-contextmenu:contextmenu.day>
    <!-- An unexamined life is not worth living. - Socrates -->
    <ul class="w-fit text-sm">
        <li>
            <a href="" x-on:click.prevent="$wire.create()" class="hover:bg-gray-100 py-0.5 px-2 w-full inline-block rounded">New Event</a>
        </li>
        <li>
            <a href="" x-on:click.prevent="$wire.paste()" class="hover:bg-gray-100 py-0.5 px-2 w-full inline-block rounded">Paste Event</a>
        </li>
    </ul>
</div>
