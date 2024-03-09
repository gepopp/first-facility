@props(['preheading', 'heading'])
<div x-data="{ onScreen: false }"
     class="bg-logo-yellow/25 overflow-hidden">
    <div class="container relative py-64 relative">
        <div x-intersect:enter.threshold.50="onScreen = true">
            <div data-aos="fade-right" class="text-logo-blue z-50 pl-12 sm:pl-24 w-full md:w-1/2 flex-1 overflow-hidden mb-8">
                <h5 class="font-serif text-3xl lowercase">{{ $preheading }}</h5>
                <h2 class="text-4xl sm:text-4xl sm:mb-4 lg:text-5xl xl:text-7xl font-bold">{{ $heading }}</h2>
            </div>
        </div>
        <div class="container">
            <div class="text-logo-blue z-50 pl-12 sm:pl-24 w-full flex-1 overflow-hidden">
                {{ $slot }}
            </div>
        </div>
        <div class="z-30">
            <div class="absolute inset-0 flex items-center"
                 x-data="{ show: false }"
                 x-intersect="show = true">
                <img src="{{ asset('backgrounds/square-large.svg') }}"
                     x-cloak
                     x-show="show"
                     x-transition:enter="transition ease-out duration-700 delay-300"
                     x-transition:enter-start="opacity-0 scale-0"
                     x-transition:enter-end="opacity-50 scale-100"
                     class="object-cover opacity-50 z-40">
            </div>
        </div>
        <x-scroll-inidcator number="03" color="logo-blue"/>
    </div>
</div>
