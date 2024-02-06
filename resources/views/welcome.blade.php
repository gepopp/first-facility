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
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="min-h-screen w-full bg-logo-dark-blue">
        <div class="container py-6 relative" x-data="{ show: false, showMenu: false }">
            <div>
                <livewire:frontpage.hero-slide/>
            </div>
            <div class="absolute inset-0 flex flex-col">
                <div class="flex flex-col">
                    <div class="flex justify-between items-center relative">
                        <div class="h-12 md:h-20 overflow-hidden">
                            <x-logo class="object-cover h-full"/>
                        </div>
                        <div>
                            <div class="md:hidden">
                                <div class="flex">
                                    <div x-on:click="show = !show">
                                        <svg class="w-10 aspect-square text-white animate-pulse" data-slot="icon" fill="none" stroke-width="1" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525"></path>
                                        </svg>
                                    </div>
                                    <div x-on:click="showMenu  = !showMenu">
                                        <svg class="w-10 aspect-square text-white animate-pulse" data-slot="icon" fill="none" stroke-width="1" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div x-cloak x-show="show" x-transition class="absolute top-full left-0 w-full p-4 bg-logo-dark-blue/75 mt-4">
                                    <x-flags-mobile-menu/>
                                </div>
                                <div x-cloak x-show="showMenu" x-transition class="absolute top-full left-0 w-full p-4 mt-4 bg-logo-dark-blue/75">
                                    <div class="flex flex-col text-white space-y-4 divide-y divide-white font-semibold">
                                        <div class="flex items-center">
                                            <a href="#" class="block hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('Home') }}</a>
                                        </div>
                                        <div class="flex items-center">
                                            <a href="#" class="block hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('Services') }}</a>
                                        </div>
                                        <div class="flex items-center">
                                            <a href="#" class="block hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('About us') }}</a>
                                        </div>
                                        <div class="flex items-center">
                                            <a href="#" class="block hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('References') }}</a>
                                        </div>
                                        <div class="flex items-center">
                                            <a href="#" class="block hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('News') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:flex text-white space-x-4 font-semibold">
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">AUT</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">BGR</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">CZE</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">HUN</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">MKD</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">ROU</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">SRB</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">SVK</a>
                                <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">SLO</a>
                            </div>
                        </div>
                    </div>


                    <div class="hidden mt-5 md:flex justify-between w-full text-white uppercase text-lg font-medium relative">
                        <nav>
                            <ul class="flex space-x-4">
                                <li>
                                    <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('Home') }}</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('Services') }}</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('About us') }}</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('References') }}</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('News') }}</a>
                                </li>
                            </ul>
                        </nav>
                        <div>
                            <a href="#" class="hover:border-b-2 pb-2 hover:pb-0 transition-all border-white">{{ __('Contact') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
