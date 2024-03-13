<div class="absolute inset-0 z-10 flex items-center pointer-events-none w-[250%] md:w-full -ml-[125%] md:ml-0"
     x-data="{ show: false }"
     x-intersect:enter="show = true"
     x-intersect:leave="show = false">
    <img src="{{ asset('backgrounds/square-large.svg') }}"
         x-cloak
         x-show="show"
         x-transition:enter="transition ease-out duration-700 delay-300 z-10"
         x-transition:enter-start="opacity-0 scale-0"
         x-transition:enter-end="opacity-50 scale-100"
         x-transition:leave="transition ease-out duration-700 delay-300 z-10"
         x-transition:leave-end="opacity-0 scale-0"
         x-transition:leave-start="opacity-50 scale-100"
         class="object-cover opacity-10 pointer-events-none z-10">
</div>
