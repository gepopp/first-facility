<div x-data="slider()">
    <div class="swiper" x-on:mouseenter="pause" x-on:mouseover="pause" x-on:mouseleave="play">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($slides as $index =>  $slide)
                <div class="swiper-slide">
                    <div class="relative flex justify-center items-center aspect-[2/3] md:aspect-video overflow-hidden w-full bg-gray-50 clip-slide-vertical -mt-1">
                        <img src="{{ $slide->getFirstMediaUrl() }}" class="min-h-full w-full object-cover brightness-75" alt="{{ $slide->title }}"/>
                        <div class="absolute inset-0 flex items-center pl-12 sm:pl-24">
                            <div class="max-w-64 z-50">
                                <h2 class="text-xl md:text-2xl lg:text-3xl xl:text-7xl font-bold text-white uppercase drop-shadow-logo">{{ $slide->title }}</h2>
                                <p class="text-white text-xs sm:text-base line-clamp-6">{{ $slide->description }}</p>

                                <div class="mt-10">
                                    <a href="{{ $slide->link }}" class="drop-shadow-logo border-radius-md clip-path-left bg-logo-light-blue text-white py-2 px-8 font-semibold cursor-pointer uppercase">{{ __( 'Details' ) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="absolute left-5 sm:left-10 bottom-0 h-[66%] flex flex-col justify-center z-50">
            <p class="text-white text-lg mt-5">01</p>
            <div class="w-0.5 mx-auto bg-white/75 h-full"></div>
        </div>
        <div class="absolute right-0 mr-4 sm:mr-10 top-1/2 -translate-y-1/2 z-10">
            <div class="relative z-50">
                <template x-for="(slide, index ) in slides" :key="slide.id">
                    <div class="py-4 border-r-4 my-2 z-50 cursor-pointer"
                         x-on:click="gotoSlide(index)"
                         :class="index == currentSlide ? 'border-logo-dark-blue': 'border-white'">
                        <p class="mr-4 uppercase hidden sm:block"
                           :class="index == currentSlide ? 'border-logo-dark-blue text-logo-dark-blue font-semibold': 'text-white'"
                           x-text="slide.title[lang]"></p>
                    </div>
                </template>
            </div>
        </div>
        <div class="absolute top-0 left-0 w-full z-10 pt-5">
            <x-menubar/>
        </div>
        <div class="absolute bottom-0 right-0 inline-flex items-center justify-center overflow-hidden rounded-full p-2 sm:p-5">
            <div class="relative flex flex-col items-center z-50">
                <div x-on:click="next" class="w-8 h-8 rounded-full bg-white text-logo-dark-blue flex justify-center items-center transition-all duration-300 hover:border border-white hover:bg-transparent hover:text-white">
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
                    <div x-show="isPaused" x-cloak x-transition  class="absolute inset-0 bg-white/25 flex justify-center items-center text-white rounded-full m-2">
                        <svg class="p-2" data-slot="icon" fill="none" stroke-width="3" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5"></path>
                        </svg>
                    </div>
                </div>
                <div x-on:click="prev" class="w-8 h-8 rounded-full text-white hover:text-logo-dark-blue hover:bg-white transition-all duration-300 border border-white flex justify-center items-center cursor-pointer">
                    <svg class="w-6 h-6" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    const settings = {
        default: {},
        fade: {
            spaceBetween: 30, effect: "fade"
        },
        cube: {
            effect: "cube",
            grabCursor: true,
            cubeEffect: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94,
            }
        },
        flip: {
            effect: 'flip'
        },
        creative: {
            effect: "creative",
            creativeEffect: {
                prev: {
                    shadow: true,
                    translate: [0, 0, -800],
                    rotate: [180, 0, 0],
                },
                next: {
                    shadow: true,
                    translate: [0, 0, -800],
                    rotate: [-180, 0, 0],
                },
            },
        }
    }

    const slides = {!! $slides->toJson() !!};

    Alpine.data('slider', () => {
        return {
            lang: '{{ app()->getLocale() }}',
            swiper: null,
            slides: slides,
            currentSlide: 0,
            rest: 0,
            circumference: 30 * 2 * Math.PI,
            percent: 100,
            interval: null,
            isPaused: false,
            init() {
                this.swiper = new Swiper('.swiper', {
                    on: {
                        init: () => {
                            this.startAutoplay();
                        },
                        activeIndexChange: () => {
                            this.currentSlide = Alpine.raw(this.swiper).activeIndex;
                            this.startAutoplay();
                        }
                    },
                    rewind: true,
                    ...settings.{{ $effect }}
                });
            },
            startAutoplay() {

                this.rest = this.delay();

                this.interval = setInterval(() => {
                    if (this.rest > 0) {
                        this.rest = this.rest - 1;
                        this.percent = 100 / this.delay() * this.rest;
                    } else {
                        this.percent = 100;
                        clearInterval(this.interval)
                        Alpine.raw(this.swiper).slideNext();
                    }
                }, 1000);
            },
            delay() {
                return this.slides[this.currentSlide].delay / 1000;
            },
            prev() {
                clearInterval(this.interval);
                Alpine.raw(this.swiper).slidePrev();
            },
            next() {
                clearInterval(this.interval);
                Alpine.raw(this.swiper).slideNext();
            },
            pause(){
                clearInterval(this.interval);
                this.isPaused = true;
            },
            play(){
                clearInterval(this.interval);
                this.isPaused = false;
                Alpine.raw(this.swiper).slideNext();
            },
            gotoSlide(index){
                this.pause();
                Alpine.raw(this.swiper).slideTo(index);
                this.pause();
            }
        }
    })
</script>

