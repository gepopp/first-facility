<x-FrontpageSections.skeleton
    number="05"
    preheading="projects"
    heading="More than 100 satisfied clients"
    background="gray"
    textcolor="logo-blue">
    <div class="flex justify-end mt-48">
        <div class="w-3/5">
            <div class="flex justify-end mb-5">
                <div class="relative">
                    <select class="bg-transparent uppercase text-lg font-medium">
                        @foreach(\App\Enums\CountriesEnum::cases() as $country)
                            <option>{{ Str::replace('_', ' ', $country->name ) }}</option>
                        @endforeach
                    </select>
                    <div class="absolute right-0 top-0 h-full bg-gray-300 flex items-center justify-center">
                        <svg class="w-8 h-4 text-logo-blue" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                        </svg>
                    </div>
                </div>
                <div class="px-4">
                    <span>|</span>
                </div>
                <div>
                    <a href="#" class="uppercase whitespace-nowrap text-logo-blue text-lg font-medium">
                        See all
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8">
                @foreach(\App\Models\Realty::limit(6)->get() as $realty)
                    <div class="ring-logo-blue ring-2 ring-offset-2 bg-logo-blue/10 backdrop-blur-xl rounded-lg overflow-hidden p-3">
                        <div class="rounded-lg overflow-hidden relative">
                            <a href="#" class="absolute bottom-0 left-0 ml-0.5 mb-0.5 bg-logo-yellow p-1.5 w-24 h-24 rounded-lg flex justify-start items-end">
                                <svg class="w-4 text-white" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"></path>
                                </svg>
                            </a>
                            <div class="drop-shadow-logo">
                                <img src="{{ $realty->getFirstMediaUrl() }}" class="aspect-video object-cover w-full clip-path-left"/>
                            </div>
                        </div>
                        <div class="ml-16 mt-10">
                            <h2 class="text-logo-blue font-semibold text-xl">
                                {{ $realty->name }}
                            </h2>
                            <p class="text-logo-blue mt-5 line-clamp-3">{{ $realty->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-FrontpageSections.skeleton>
