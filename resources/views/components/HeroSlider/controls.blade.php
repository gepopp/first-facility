<div class="absolute bottom-0 right-0 inline-flex items-center justify-center overflow-hidden rounded-full p-2 lg:p-5">
    <div class="relative flex flex-col items-center z-50">
        <div x-on:click="next" class="md:hidden lg:flex w-8 h-8 rounded-full bg-white text-logo-dark-blue flex justify-center items-center transition-all duration-300 hover:border border-white hover:bg-transparent hover:text-white">
            <svg class="w-6 h-6" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18"></path>
            </svg>
        </div>
        <div class="relative flex justify-center items-center">
            <svg x-ref="svg" class="w-20 h-20">
                <defs>
                    <filter id="glow">
                        <fegaussianblur class="blur" result="coloredBlur" stddeviation="1"></fegaussianblur>
                        <femerge>
                            <femergenode in="coloredBlur"></femergenode>
                            <femergenode in="coloredBlur"></femergenode>
                            <femergenode in="coloredBlur"></femergenode>
                            <femergenode in="SourceGraphic"></femergenode>
                        </femerge>
                    </filter>
                </defs>
                <circle
                    class="text-white/50"
                    stroke-width="5"
                    stroke="currentColor"
                    fill="transparent"
                    r="30"
                    cx="40"
                    cy="40"
                />
                <circle
                    class="text-white transition-all duration-1000 ring-2 ring-white"
                    stroke-width="3"
                    style="filter: url(#glow);"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - percent / 100 * circumference"
                    stroke-linecap="round"
                    stroke="currentColor"
                    fill="transparent"
                    r="30"
                    cx="40"
                    cy="40"
                />
            </svg>
            <span class="absolute text-2xl text-white font-semibold" x-text="`${rest}`"></span>
            <div x-show="isPaused" x-cloak x-transition class="absolute inset-0 bg-white/25 flex justify-center items-center text-white rounded-full m-2">
                <svg class="p-2" data-slot="icon" fill="none" stroke-width="3" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5"></path>
                </svg>
            </div>
        </div>
        <div x-on:click="prev" class="md:hidden lg:flex w-8 h-8 rounded-full text-white hover:text-logo-dark-blue hover:bg-white transition-all duration-300 border border-white flex justify-center items-center cursor-pointer">
            <svg class="w-6 h-6" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"></path>
            </svg>
        </div>
    </div>
</div>

