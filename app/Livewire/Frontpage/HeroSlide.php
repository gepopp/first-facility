<?php

namespace App\Livewire\Frontpage;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\HeroSlide as Slides;

class HeroSlide extends Component
{
    public $slides;

    #[Url]
    public string $effect = 'default';


    public function mount()
    {
        $this->slides = Slides::all();
    }


    public function render()
    {
        return view( 'livewire.frontpage.hero-slide' );
    }
}
