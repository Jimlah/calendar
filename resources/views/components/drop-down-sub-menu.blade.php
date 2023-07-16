<li>
    <a
        href=""
        {{
        $attributes->merge(['class' => "hover:bg-gray-100 py-0.5 px-2 w-full inline-block rounded data-[disabled=true]:opacity-50 hover:data-[disabled=true]:bg-transparent hover:bg-gray-100 py-0.5 px-2 w-full rounded flex items-center justify-between space-x-10"])}}
        class="data-[disabled=true]:opacity-50 hover:data-[disabled=true]:bg-transparent hover:bg-gray-100 py-0.5 px-2 w-full rounded flex items-center justify-between space-x-10"
    >
        <span class="flex items-center justify-start space-x-0.5">
            <x-mdi-check class="w-4 h-4" />
            <span>{{$slot}}</span>
        </span>
        <x-mdi-chevron-right  class="w-4 h-4"/>
    </a>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</li>
