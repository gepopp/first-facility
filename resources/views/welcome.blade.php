<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>First Facility - always first</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
    @livewireStyles
</head>
<body class="antialiased">
<div class="w-full bg-logo-dark-blue">
    <livewire:frontpage.hero-slide/>
</div>
@php
    $infoblock = \App\Models\FrontpageIntrotextBlock::first();
@endphp
<div class="bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90% min-h-screen pt-64">
    <div class="container bg-center bg-opacity-75 relative">
        <div class="flex">
            <div class="text-white z-50 pl-12 sm:pl-24 w-1/2">
                <h5 class="font-serif text-3xl lowercase">{{ $infoblock->pre_heading }}</h5>
                <h2 class="text-xl sm:text-4xl sm:mb-4 lg:text-3xl xl:text-7xl font-bold">{{ $infoblock->heading }}</h2>
            </div>
            <div class="w-1/2 flex">
                <div class="w-1/2">
                    {{ $infoblock->excerpt }}
                </div>
                <div class="w-1/2">
                    {{ $infoblock->text }}
                </div>>
            </div>
            <div class="w-1/2">

            </div>
        </div>

        <div class="absolute inset-0 z-40">
            <img src="{{ asset('backgrounds/square-large.svg') }}" class="object-cover opacity-50">
        </div>
    </div>
</div>


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
