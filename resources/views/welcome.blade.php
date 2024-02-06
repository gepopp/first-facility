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
        <div class="container pt-0 py-6 relative" x-data="{ show: false, showMenu: false }">
            <div>
                <livewire:frontpage.hero-slide/>
            </div>
        </div>
    </div>

</div>
</body>
</html>
