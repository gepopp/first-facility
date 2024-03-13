<div>
    <form wire:submit="submit" class="text-white">
        <div>
            <label class="text-white font-semibold mb-2">{{ __('Countries serviced needed') }}</label>
            <div class="grid grid-cols-3 gap-x-4 gap-y-2">
                @foreach(\App\Enums\CountriesEnum::cases() as $country)
                    <label class="flex items-center space-x-4">
                        <input type="checkbox"
                               name="countries"
                               wire:model="countries"
                               value="{{ $country->name }}"
                               class="w-4 h-4 border border-logo-light-blue text-logo-light-blue outline-none">
                        <p>{{ $country->getLong() }}</p>
                    </label>
                @endforeach
            </div>
            <div class="h-4">
                @error('countries')
                <p class="text-sm font-semibold texr-logo-yellow">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label class="text-white font-semibold mb-2">{{ __('Service needed') }}</label>
            <div class="grid grid-cols-3 gap-4">
                @foreach(\App\Models\ServiceCategory::all() as $category )
                    <label class="flex items-center space-x-4">
                        <input type="checkbox" name="categories" wire:model="categories" value="{{ $category->id }}">
                        <p>{{ $category->name }}</p>
                    </label>
                @endforeach
            </div>
            <div class="h-4">
                @error('categories')
                <p class="text-sm font-semibold texr-logo-yellow">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label class="text-white font-semibold mb-2 block">{{ __('Name') }}</label>
            <input type="text" wire:model="name" required class="text-lg p-2 bg-transparent !border-t-0 border-l-0 border-r-0 border-b-2 border-logo-light-blue outline-none w-full focus:border-0 focus:outline-none">
            <div class="h-4">
                @error('name')
                <p class="text-sm font-semibold texr-logo-yellow">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label class="text-white font-semibold mb-2 block">{{ __('Email') }}</label>
            <input type="text" wire:model="email" required class="text-lg p-2 bg-transparent !border-t-0 border-l-0 border-r-0 border-b-2 border-logo-light-blue outline-none w-full focus:border-0 focus:outline-none">
            <div class="h-4">
                @error('email')
                <p class="text-sm font-semibold texr-logo-yellow">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label class="text-white font-semibold mb-2 block">{{ __('Phone') }}</label>
            <input type="text" wire:model="phone" class="text-lg p-2 bg-transparent !border-t-0 border-l-0 border-r-0 border-b-2 border-logo-light-blue outline-none w-full focus:border-0 focus:outline-none">
            <div class="h-4">
                @error('phone')
                <p class="text-sm font-semibold texr-logo-yellow">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label class="text-white font-semibold mb-2 block">{{ __('Message') }}</label>
            <textarea wire:model="message"
                      class="text-lg p-2 bg-transparent !border-t-0 border-l-0 border-r-0 border-b-2 border-logo-light-blue outline-none w-full focus:border-0 focus:outline-none"></textarea>
            <div class="h-4">
                @error('phone')
                <p class="text-sm font-semibold texr-logo-yellow">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit" class="button">{{ __('Send') }}</button>
        </div>
    </form>
</div>
