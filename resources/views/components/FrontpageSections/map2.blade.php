<div class="bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90% overflow-hidden">
    <div class="container relative py-64">
        <div>
            <div data-aos="fade-right" class="text-white z-50 pl-12 sm:pl-24 w-full md:w-1/2 flex-1 overflow-hidden mb-8">
                <h5 class="font-serif text-3xl lowercase">9 Countries</h5>
                <h2 class="text-4xl sm:text-4xl sm:mb-4 lg:text-5xl xl:text-7xl font-bold">One Team Of Experts</h2>
            </div>
            <div data-aos="fade-left" class="w-full z-50 ml-10 sm:ml-24 md:ml-0 relativ">
                <div class="grid grid-cols-2 gap-10">
                    <div></div>
                    <div>
                        <style>
                            .flip {
                                transform: perspective(750px) translate3d(0px, 0px, -250px) rotateX(27deg) scale(0.9, 0.9);
                                box-shadow: 0 70px 40px -20px rgba(0, 0, 0, 0.2);
                                transition: 0.4s ease-in-out transform;
                            }

                            .flip:hover {
                                transform: translate3d(0px, 0px, -250px);
                            }
                            .flip.active {
                                transform: translate3d(0px, 0px, -250px);
                            }
                        </style>
                        <div class="grid grid-cols-3 gap-8" x-data="{ active: 0 }"
                             x-init=" setInterval(() => {
                            if(active == 8){
                                active = 0;
                            }else{
                                active++;
                            }
                        }, 2000) ">
                            <div class="flip w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 0 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 1 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 2 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 3 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 4 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 5 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 6 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 7 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                            <div class="flip  w-full aspect-square  rounded-lg border border-white p-2 relative"
                                 :class="active == 8 ? 'active' : ''">
                                <div class="clip-path-left bg-white/25 backdrop-blur-sm p-2">
                                    <img src="{{ asset('map/outline-at.svg') }}"/>
                                </div>
                                <div class="p-1 absolute top-full right-full translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-full bg-white">
                                    <img src="{{ asset('flag-icons/aut-round.svg') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 z-40 flex items-center pointer-events-none"
             x-data="{ show: false }"
             x-intersect="show = true">
            <img src="{{ asset('backgrounds/square-large.svg') }}"
                 x-cloak
                 x-show="show"
                 x-transition:enter="transition ease-out duration-700 delay-300"
                 x-transition:enter-start="opacity-0 scale-0"
                 x-transition:enter-end="opacity-50 scale-100"
                 class="object-cover opacity-10">
        </div>
        <x-scroll-inidcator number="02"/>
    </div>
</div>
