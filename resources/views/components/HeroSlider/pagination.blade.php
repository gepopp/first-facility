<div class="absolute right-0 mr-4 sm:mr-10 top-1/2 -translate-y-full z-10">
    <div class="relative z-50">
        <template x-for="(slide, index ) in slides" :key="slide.id">
            <div class="py-2 border-r-4 my-2 z-50 cursor-pointer"
                 x-on:click="gotoSlide(index)"
                 :class="index == currentSlide ? 'border-logo-dark-blue': 'border-white'">
                <p class="mr-4 uppercase hidden sm:block"
                   :class="index == currentSlide ? 'border-logo-dark-blue text-logo-dark-blue font-semibold': 'text-white'"
                   x-text="slide.title[lang]"></p>
            </div>
        </template>
    </div>
</div>
