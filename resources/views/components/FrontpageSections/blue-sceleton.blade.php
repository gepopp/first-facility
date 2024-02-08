@props(['preheading', 'heading'])
<div x-data="{ onScreen: false }"
    class="bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90% overflow-hidden">
    <div class="container relative py-64">
        <div class="flex w-full justify-between" x-intersect:enter.threshold.50="onScreen = true">
            <div class="text-white z-50 pl-12 sm:pl-24 w-1/2 flex-1 overflow-hidden">
                <h5 x-cloak
                    x-show="onScreen"
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="-translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in duration-700"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="-translate-x-full"
                    class="font-serif text-3xl lowercase">{{ $preheading }}</h5>
                <h2 x-cloak
                    x-show="onScreen"
                    x-transition:enter="transition ease-out duration-700 delay-500"
                    x-transition:enter-start="-translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in duration-700"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="-translate-x-full"
                    class="text-xl sm:text-4xl sm:mb-4 lg:text-3xl xl:text-7xl font-bold">{{ $heading }}</h2>
            </div>
            <div x-cloak
                 x-show="onScreen"
                 x-transition:enter="transition ease-out duration-500 delay-1000"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90"
                class="w-1/2 z-50">
                {{ $slot }}
            </div>
        </div>
        <div class="absolute inset-0 z-40">
            <img src="{{ asset('backgrounds/square-large.svg') }}" class="object-cover opacity-50">
        </div>
        <x-scroll-inidcator number="02"/>
    </div>
</div>
