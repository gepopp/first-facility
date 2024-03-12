@props(['preheading', 'heading', 'number', 'background', 'textcolor'])
<div @class([
    "overflow-hidden",
    "bg-gradient-to-b from-logo-dark-blue from-30% to-logo-blue to-90%" => $background == 'gradient',
    "bg-gradient-to-b from-logo-yellow/30 from-30% to-logo-yellow/10 to-90%" => $background == 'yellow',
    "bg-white" => $background == 'white'
])
    class="bg-{{ $background }} overflow-hidden">
    <div class="container relative py-64">
        <x-FrontpageSections.background-square/>
        <div class="z-50">
            <div data-aos="fade-right" class="text-{{ $textcolor }} pl-12 sm:pl-24 w-full md:w-1/2 flex-1 overflow-hidden mb-8">
                <h5 class="font-serif text-3xl lowercase z-50">{{ $preheading }}</h5>
                <h2 class="text-4xl sm:text-4xl sm:mb-4 lg:text-5xl xl:text-7xl font-bold">{{ $heading }}</h2>
            </div>
            {{ $slot }}
        </div>
        <x-scroll-inidcator :color="$textcolor" :number="$number"/>
    </div>
</div>
