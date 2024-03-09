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

<x-FrontpageSections.yellow-skeleton preheading="360° realty care" heading="Our Service in three Departments">
    @foreach(\App\Models\ServiceCategory::orderBy('order_on_frontpage')->get() as $index => $service)
        <div data-aos="fade-up" class="grid lg:grid-cols-2 lg:gap-10 py-24 lg:py-36 pr-4 lg:pr-0 z-50">
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

<div class="bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90% overflow-hidden">
    <div class="container py-64">
        <livewire:intercative-map/>
    </div>
</div>


<div class="bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90% min-h-screen py-64">
    <div class="container bg-center bg-opacity-75 relative">
        <div class="flex w-full justify-between">
            <div class="text-white z-50 pl-12 sm:pl-24 w-1/2">
                <h5 class="font-serif text-3xl lowercase">{{ __('The first facility team') }}</h5>
                <h2 class="text-xl sm:text-4xl sm:mb-4 lg:text-3xl xl:text-7xl font-bold">{{ __('Experience & Competence') }}</h2>
            </div>
        </div>
        <div class="absolute inset-0 z-40">
            <img src="{{ asset('backgrounds/square-large.svg') }}" class="object-cover opacity-50 rotate-180">
        </div>
        <div x-data="employees" class="flex justify-end w-full">
            <div class="w-2/3 mt-32 z-50 h-96">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-4">
                        <div class="cursor-pointer w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <svg class="w-8 text-logo-dark-blue" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
                            </svg>
                        </div>
                        <div class="cursor-pointer w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <svg class="w-8 text-logo-dark-blue" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-white underline">{{ __('show all') }}</p>
                </div>

                <div class="mt-10">
                    <div class="employee-swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach( \App\Models\Employee::all() as $employee )
                                <div class="swiper-slide">
                                    <div class="border-logo-light-blue border rounded-lg overflow-hidden p-3">
                                        <div class="rounded-lg overflow-hidden relative">
                                            <a href="mailto:{{ $employee->email }}" class="absolute bottom-1 left-1 bg-logo-light-blue p-2 w-24 h-24 rounded-lg flex justify-start items-end">
                                                <svg class="w-4 text-white" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"></path>
                                                </svg>
                                            </a>
                                            <img src="{{ $employee->getFirstMediaUrl() }}" class="drop-shadow-logo aspect-video object-cover w-full clip-path-left"/>
                                        </div>
                                        <div class="ml-16 mt-10">
                                            <h2 class="text-white font-semibold text-xl">
                                                {{ $employee->academic_degree }}
                                                {{ $employee->name }}
                                                {{ $employee->postgraduate }}
                                            </h2>
                                            <p class="text-logo-light-blue mt-5">{{ $employee->position }}</p>
                                            <p class="text-white mt-5">{{ $employee->description }}</p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            Alpine.data('employees', () => {
                return {
                    swiper: null,
                    init() {
                        this.swiper = new Swiper('.employee-swiper', {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        });
                    }
                }
            })
        </script>


        <div class="absolute left-5 sm:left-10 bottom-0 h-full flex flex-col justify-center z-50">
            <p class="text-white text-lg mt-5">05</p>
            <div class="w-0.5 mx-auto bg-white/75 h-full"></div>
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
