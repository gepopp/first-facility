<x-FrontpageSections.skeleton
    number="02"
    background="yellow"
    textcolor="logo-blue"
    preheading="Services"
    heading="Wide Range Of Services">
    <div class="container">
        <div class="text-logo-blue z-50 pl-12 sm:pl-24 w-full flex-1 overflow-hidden">
            @foreach(\App\Models\ServiceCategory::orderBy('order_on_frontpage')->get() as $index => $service)
                <div data-aos="fade-up" class="grid lg:grid-cols-2 lg:gap-10 py-24 lg:py-18 pr-4 lg:pr-0 z-50">
                    <div @class([ 'mb-5 lg:mb-0 z-50','lg:order-last' => $index % 2 == 0 ])>
                        <img src="{{ $service->getFirstMediaUrl() }}" class="aspect-video object-cover clip-path-left drop-shadow-logo">
                    </div>
                    <div class="flex items-center z-50">
                        <div>
                            <h3 class="text-3xl font-semibold text-logo-blue">{{ $service->name }}</h3>
                            <p class="text-sm font-thin line-clamp-6">{{ $service->description }}</p>
                            <div class="mt-10">
                                <a href="#" class="drop-shadow-logo border-radius-md clip-path-left bg-logo-yellow text-white py-2 px-8 font-semibold cursor-pointer uppercase">{{ __( 'Details' ) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-FrontpageSections.skeleton>
