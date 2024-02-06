<div x-data="slider()">
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($slides as $index =>  $slide)
                <div class="swiper-slide">
                    <div class="relative flex justify-center items-center aspect-[2/2.5] md:aspect-video overflow-hidden w-full bg-gray-50 clip-slide-vertical -mt-1">
                        <img src="{{ $slide->getFirstMediaUrl() }}" class="min-h-full w-full object-cover"/>
                        <div class="absolute inset-0 flex items-center px-20">
                            <div class="max-w-2xl">
                                <h2 class="text-xl md:text-2xl lg:text-3xl xl:text-7xl font-bold text-white uppercase">{{ $slide->title }}</h2>
                                <p class="text-white">{{ $slide->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="absolute inset-0 z-10 px-5 pt-5">
            <x-menubar/>
        </div>
    </div>
    <div x-on:click="next" class="text-red-800">next</div>
</div>
<script>


    Alpine.data('slider', () => {
        return {
            swiper: null,
            init() {
                this.swiper = new Swiper('.swiper' );
            },
            next()
            {
                Alpine.raw(this.swiper).slideNext();
            }
        }
    })
</script>
