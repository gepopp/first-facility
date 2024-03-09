@props(['preheading', 'heading'])
<div x-data="{ onScreen: false }"
     class="bg-logo-yellow/25 overflow-hidden">
    <div class="container relative py-64">
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
        <div class="absolute flex items-center inset-0 z-40">
            <img src="{{ asset('backgrounds/square-large.svg') }}" class="object-cover opacity-50">
        </div>
        <x-scroll-inidcator number="03" color="logo-blue"/>
    </div>
</div>
