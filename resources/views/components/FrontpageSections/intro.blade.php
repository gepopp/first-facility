@props(['infoblock'])
<x-FrontpageSections.skeleton
    number="01"
    :preheading="$infoblock->pre_heading"
    :heading="$infoblock->heading"
    background="gradient"
    textcolor="white"
>
    <div class="w-full flex justify-end">
        <div data-aos="fade-left" class="w-full md:w-1/2 z-50 sm:ml-20 md:ml-0 ">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-4 md:w-full lg:w-1/2">
                    <p class="text-white text-sm font-semibold">{{ $infoblock->excerpt }}</p>
                </div>
                <div class="w-full sm:w-1/2 p-4 sm:border-l border-white md:w-full lg:w-1/2 md:border-0 lg:border-l">
                    <p class="text-white text-sm font-thin">{{ $infoblock->text }}</p>
                </div>
            </div>
            <div class="mt-8 lg:mt-64 md:ml-0 px-4 aspect-video">
                <div class="bg-white clip-path-left">
                    @if( !is_null($infoblock->embed_code) )
                        {!! $infoblock->embed_code !!}
                    @else
                        <img src="{{ $infoblock->getFirstMediaUrl() }}" class="aspect-video object-cover clip-path-left drop-shadow-logo">
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-FrontpageSections.skeleton>
