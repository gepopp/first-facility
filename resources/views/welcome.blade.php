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

<x-FrontpageSections.intro :infoblock="\App\Models\FrontpageIntrotextBlock::first()"/>

<x-FrontpageSections.services/>

@if(!request()->has('map'))
    <x-FrontpageSections.interactive-map/>
@else
    <x-FrontpageSections.map2/>
@endif
<x-FrontpageSections.team/>


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
