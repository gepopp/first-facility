<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First Facility - always first</title>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
    @livewireStyles
</head>
<body class="antialiased text-logo-dark-blue">

<livewire:frontpage.hero-slide/>

@php
    $infoblock = \App\Models\FrontpageIntrotextBlock::first();
@endphp
<x-FrontpageSections.blue-sceleton :preheading="$infoblock->pre_heading" :heading="$infoblock->heading">
    <div class="flex flex-wrap">
        <div class="w-full sm:w-1/2 p-4 md:w-full lg:w-1/2">
            <p class="text-white text-sm font-semibold">{{ $infoblock->excerpt }}</p>
        </div>
        <div class="w-full sm:w-1/2 p-4 sm:border-l border-white md:w-full lg:w-1/2 md:border-0 lg:border-l">
            <p class="text-white text-sm font-thin">{{ $infoblock->text }}</p>
        </div>
    </div>
    <div class="mt-8 lg:mt-64 md:ml-0 px-4 aspect-video">
        <div class="bg-white clip-path-left">
            @if( !is_null($infoblock->embed_code) )
                {!! $infoblock->embed_code !!}
            @else
                <img src="{{ $infoblock->getFirstMediaUrl() }}" class="aspect-video object-cover clip-path-left drop-shadow-logo">
            @endif
        </div>
    </div>
</x-FrontpageSections.blue-sceleton>

<x-FrontpageSections.yellow-skeleton preheading="Services" heading="Wide Range Of Services">
    @foreach(\App\Models\ServiceCategory::orderBy('order_on_frontpage')->get() as $index => $service)
        <div data-aos="fade-up" class="grid lg:grid-cols-2 lg:gap-10 py-24 lg:py-18 pr-4 lg:pr-0 z-50">
            <div @class([ 'mb-5 lg:mb-0 z-50','lg:order-last' => $index % 2 == 0 ])>
                <img src="{{ $service->getFirstMediaUrl() }}" class="aspect-video object-cover clip-path-left drop-shadow-logo">
            </div>
            <div class="flex items-center z-50">
                <div>
                    <h3 class="text-3xl font-semibold text-logo-blue">{{ $service->name }}</h3>
                    <p class="text-sm font-thin line-clamp-6">{{ $service->description }}</p>
                    <div class="mt-10">
                        <a href="#" class="drop-shadow-logo border-radius-md clip-path-left bg-logo-yellow text-white py-2 px-8 font-semibold cursor-pointer uppercase">{{ __( 'Details' ) }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-FrontpageSections.yellow-skeleton>

<x-FrontpageSections.blue-full-sceleton preheading="CEE & SEE" heading="Nine countries, one partner">
    <livewire:intercative-map/>
</x-FrontpageSections.blue-full-sceleton>

<x-FrontpageSections.white-skeleton preheading="Competence" heading="Experienced Team">

</x-FrontpageSections.white-skeleton>

<div class="min-h-screen bg-logo-gray"></div>

@if( config('app.debug') )
    <div class="fixed bottom-0 right-0 bg-white/50">
        <p class="font-bold text-black text-5xl p-5 sm:hidden">xs</p>
        <p class="font-bold text-black text-5xl p-5 hidden sm:block md:hidden">sm</p>
        <p class="font-bold text-black text-5xl p-5 hidden md:block lg:hidden">md</p>
        <p class="font-bold text-black text-5xl p-5 hidden lg:block xl:hidden">lg</p>
        <p class="font-bold text-black text-5xl p-5 hidden 2xl:block">xl</p>
    </div>
@endif

</body>
</html>
