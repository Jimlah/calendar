<div class="fixed" x-popover :listeners="['popover']" @onload="" x-cloak>
        <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
{{--    <div class="absolute top-0 inline-block w-5 mt-px overflow-hidden -translate-x-2 -translate-y-2.5 left-1/2">--}}
{{--        <div class="w-2.5 h-2.5 origin-bottom-left transform rotate-45 bg-white border-t border-l rounded-sm">--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="w-fit h-fit p-40 bg-white rounded-md shadow-2xl" >
        Popover
    </div>
    <button @click="close()" class="absolute top-0 right-0 m-1 rounded-full w-6 h-6 flex items-center justify-center text-sm">
        <x-mdi-close class="w-4 h-4" />
    </button>
    {{ $slot }}
</div>
