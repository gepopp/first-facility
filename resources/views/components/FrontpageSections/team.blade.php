<x-FrontpageSections.skeleton
    number="04"
    preheading="Competence"
    heading="Experienced Team"
    textcolor="logo-blue"
    background="white">
    <div data-aos="fade-left"
         x-data="employees"
         class="flex justify-end w-full z-50">
        <div class="w-full md:w-2/3 pl-20 pr-3 mt-32 z-50">
            <div class="employee-swiper overflow-hidden relative pt-16">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach( \App\Models\Employee::all() as $employee )
                        <div class="swiper-slide">
                            <div class="ring-logo-light-blue ring-2 ring-offset-2 bg-logo-blue/10 backdrop-blur-xl m-2 rounded-lg overflow-hidden p-3">
                                <div class="rounded-lg overflow-hidden relative">
                                    <a href="mailto:{{ $employee->email }}" class="absolute bottom-0 left-0 ml-0.5 mb-0.5 bg-logo-light-blue p-1.5 w-24 h-24 rounded-lg flex justify-start items-end">
                                        <svg class="w-4 text-white" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"></path>
                                        </svg>
                                    </a>
                                    <div class="drop-shadow-logo">
                                        <img src="{{ $employee->getFirstMediaUrl() }}" class="aspect-video object-cover w-full clip-path-left"/>
                                    </div>
                                </div>
                                <div class="ml-16 mt-10">
                                    <h2 class="text-logo-blue font-semibold text-xl">
                                        {{ $employee->academic_degree }}
                                        {{ $employee->name }}
                                        {{ $employee->postgraduate }}
                                    </h2>
                                    <p class="text-logo-light-blue mt-5">{{ $employee->position }}</p>
                                    <p class="text-logo-blue mt-5 line-clamp-3">{{ $employee->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="absolute top-0 left-0 w-full flex justify-between items-center">
                    <div class="flex space-x-4">
                        <div class="staff-swiper-button-prev cursor-pointer w-10 h-10 bg-logo-blue rounded-full flex items-center justify-center">
                            <svg class="w-8 text-white" data-slot="icon" fill="none" stroke-width="2.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
                            </svg>
                        </div>
                        <div class="staff-swiper-button-next cursor-pointer w-10 h-10 bg-logo-blue rounded-full flex items-center justify-center">
                            <svg class="w-8 text-white" data-slot="icon" fill="none" stroke-width="2.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-logo-blue underline">{{ __('show all') }}</p>
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
                        autoplay: {
                            delay: 2500
                        },
                        slidesPerView: 1,
                        spaceBetween: 20,
                        breakpoints: {
                            // when window width is >= 320px
                            640: {
                                slidesPerView: 2,
                                spaceBetween: 20
                            },
                            // when window width is >= 480px
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            1024: {
                                slidesPerView: 2,
                                spaceBetween: 30
                            },
                            // when window width is >= 640px
                            1536: {
                                slidesPerView: 3,
                                spaceBetween: 40
                            }
                        },
                        navigation: {
                            nextEl: ".staff-swiper-button-next",
                            prevEl: ".staff-swiper-button-prev",
                        },
                    });
                }
            }
        })
    </script>
</x-FrontpageSections.skeleton>
