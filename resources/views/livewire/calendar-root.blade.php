<div class="w-full h-full">
    <div class="grid grid-cols-8 w-full h-screen text-gray-900" x-contextmenu>
        {{-- Because she competes with no one, no one can compete with her. --}}
        <div class="col-span-1 bg-gray-200"></div>
        <div class="col-span-7 h-full w-full">
            <div class="flex flex-col items-start justify-start w-full h-full">
                <div class="h-10 w-full bg-gray-100 flex items-center flex-none justify-between px-4 text-xs">
                    <div class="flex items-center justify-start">
                        <div class="flex items-center justify-start fixed left-0 top-0 ml-2 mt-2 rounded-md border hover:bg-gray-200 overflow-hidden w-fit">
                            <x-period-button class="px-1">
                                <x-mdi-calendar class="w-4 h-4" />
                            </x-period-button>
                            <x-period-button class="px-1">
                                <x-mdi-file class="w-4 h-4" />
                            </x-period-button>
                        </div>
                        <x-mdi-plus class="w-4 h-4" />
                    </div>
                    <div class="rounded-md border hover:bg-gray-200 overflow-hidden flex items-center justify-between w-fit">
                        <x-period-button data-active="true">Day</x-period-button>
                        <x-period-button >Week</x-period-button>
                        <x-period-button >Month</x-period-button>
                        <x-period-button >Day</x-period-button>
                    </div>
                    <div>search</div>
                </div>
                <div class="h-full w-full flex items-start justify-start overflow-y-auto">
                    <x-period.month :currentDate="$currentDate" />
                </div>
            </div>
        </div>
        <x-context-menu/>
        <x-context-menu-day />
    </div>
</div>
