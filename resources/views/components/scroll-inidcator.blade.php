@props(['number', 'color' => 'white'])
<div x-data="{ onScreen: false }"
    {{ $attributes->merge(['class' => "absolute left-5 sm:left-10 top-64 h-full flex flex-col justify-center z-50"]) }}>
    <p  x-intersect:enter="onScreen = true"
        x-intersect:leave="onScreen = false"
        class="text-{{ $color }} text-lg mt-5">{{ $number }}</p>
    <div class="h-full overflow-hidden">
        <div class="w-0.5 mx-auto bg-{{$color}}/75 h-full relative">
            <div x-cloak
                 x-show="onScreen"
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="-translate-y-full"
                 x-transition:enter-end="translate-y-0"
                 x-transition:leave="transition ease-in duration-700"
                 x-transition:leave-start="translate-y-0"
                 x-transition:leave-end="-translate-y-full"
                 class="absolute top-0 left-0 w-1 bg-{{$color}} h-48 -translate-x-px"></div>
        </div>
    </div>
</div>
