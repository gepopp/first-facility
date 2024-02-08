<div class="w-full bg-logo-dark-blue">
    <div x-data="slider()" class="container relative">
        <div class="swiper" x-on:mouseenter="pause" x-on:mouseover="pause" x-on:mouseleave="play">
            <div class="swiper-wrapper">
                @foreach($slides as $index =>  $slide)
                    <div class="swiper-slide">
                        <div class="relative flex justify-center items-center aspect-[2/3] md:aspect-video overflow-hidden w-full bg-gray-50 clip-slide-vertical -mt-1 -mb-[10px]">
                            <img src="{{ $slide->getFirstMediaUrl() }}" class="min-h-full w-full object-cover brightness-50" alt="{{ $slide->title }}"/>
                            <div class="absolute inset-0 flex items-center pl-12 sm:pl-24">
                                <div class="max-w-64 sm:max-w-xs md:max-w-md z-50">
                                    <h2 class="text-xl sm:text-4xl sm:mb-4 lg:text-3xl xl:text-7xl font-bold text-white uppercase drop-shadow-logo">{{ $slide->title }}</h2>
                                    <p class="sm:leading-none text-white text-xs sm:text-base line-clamp-6 lg:line-clamp-[8]">{{ $slide->description }}</p>
                                    <div class="mt-10">
                                        <a href="{{ $slide->link }}" class="drop-shadow-logo border-radius-md clip-path-left bg-logo-light-blue text-white py-2 px-8 font-semibold cursor-pointer uppercase">{{ __( 'Details' ) }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <x-scroll-inidcator class="pb-2" number="01"/>
            <x-menubar/>
            <x-HeroSlider.pagination/>
            <x-HeroSlider.controls/>

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
                    spaceBetween: 30,
                    ...settings.{{ $effect }}
                });
            },
            startAutoplay() {

                this.isPaused = false;
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
            pause() {
                clearInterval(this.interval);
                this.isPaused = true;
            },
            play() {
                clearInterval(this.interval);
                this.isPaused = false;
                Alpine.raw(this.swiper).slideNext();
            },
            gotoSlide(index) {
                this.pause();
                Alpine.raw(this.swiper).slideTo(index);
                this.pause();
            }
        }
    })
</script>

