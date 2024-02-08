@props(['preheading', 'heading'])
<div class="bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90% overflow-hidden">
    <div class="container relative py-64">
        <div class="flex w-full justify-between">
            <div class="text-white z-50 pl-12 sm:pl-24 w-1/2 flex-1">
                <h5 class="font-serif text-3xl lowercase">{{ $preheading }}</h5>
                <h2 class="text-xl sm:text-4xl sm:mb-4 lg:text-3xl xl:text-7xl font-bold">{{ $heading }}</h2>
            </div>
            <div class="w-1/2  flex z-50">
                {{ $slot }}
            </div>
        </div>
        <div class="absolute inset-0 z-40">
            <img src="{{ asset('backgrounds/square-large.svg') }}" class="object-cover opacity-50">
        </div>
        <x-scroll-inidcator number="02"/>
    </div>
</div>
