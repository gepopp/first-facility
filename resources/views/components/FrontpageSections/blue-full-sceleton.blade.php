@props(['preheading', 'heading'])
<div class="bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90% overflow-hidden">
    <div class="container relative py-64">
        <div>
            <div data-aos="fade-right" class="text-white z-50 pl-12 sm:pl-24 w-full md:w-1/2 flex-1 overflow-hidden mb-8">
                <h5 class="font-serif text-3xl lowercase">{{ $preheading }}</h5>
                <h2 class="text-4xl sm:text-4xl sm:mb-4 lg:text-5xl xl:text-7xl font-bold">{{ $heading }}</h2>
            </div>
            <div data-aos="fade-left"
                class="w-full z-50 ml-10 sm:ml-24 md:ml-0 relativ">
                <div class="-mx-48">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="scale-0"></div>
{{--        <div class="absolute inset-0 z-40 flex items-center"--}}
{{--             x-data="{ show: false }"--}}
{{--             x-intersect="show = true">--}}
{{--            <img src="{{ asset('backgrounds/square-large.svg') }}"--}}
{{--                 x-cloak--}}
{{--                 x-show="show"--}}
{{--                 x-transition:enter="transition ease-out duration-700 delay-300"--}}
{{--                 x-transition:enter-start="opacity-0 scale-0"--}}
{{--                 x-transition:enter-end="opacity-50 scale-100"--}}
{{--                 class="object-cover opacity-10">--}}
{{--        </div>--}}
        <x-scroll-inidcator number="02"/>
    </div>
</div>
