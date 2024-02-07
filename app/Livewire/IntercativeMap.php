<?php

namespace App\Livewire;

use App\Enums\CountriesEnum;
use Livewire\Component;

class IntercativeMap extends Component
{


    public function render()
    {
        $countries = CountriesEnum::toAssociativeArray();

        $countries['at'] = 'Austria';
        unset( $countries['de'] );

        return view( 'livewire.intercative-map', compact( 'countries' ) );
    }
}
