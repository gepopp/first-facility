<div class="absolute right-0 mr-4 sm:mr-10 top-1/2 -translate-y-1/2 z-10">
    <div class="relative z-50">
        <template x-for="(slide, index ) in slides" :key="slide.id">
            <div class="py-2 my-2 z-50 cursor-pointer border-white"
                 x-on:click="gotoSlide(index)"
                 :class="index == currentSlide ? 'border-r-4' : 'border-r-2'">
                <p class="mr-4 uppercase hidden sm:block text-white"
                   :class="index == currentSlide ? 'underline underline-offset-4 font-bold': ''"
                   x-text="slide.title[lang]"></p>
            </div>
        </template>
    </div>
</div>
