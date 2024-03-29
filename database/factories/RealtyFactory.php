<?php

namespace Database\Factories;

use App\Enums\CountriesEnum;
use App\Models\Realty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Realty>
 */
class RealtyFactory extends Factory
{


    protected $model = Realty::class;

    public function configure(): static
    {
        return $this->afterCreating( function ( Realty $realty ) {
            $realty->addMediaFromUrl( 'https://picsum.photos/1920/1080' )
                   ->preservingOriginal()
                   ->preservingOriginal()
                   ->toMediaCollection( 'default', 's3' );
        } );
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'countries'          => [ "de", "bg", "hu", "mk", "ro", "sk", "sl", "sr" ],
            'country'            => CountriesEnum::Austria->value,
            'realty_category_id' => 1,
            'name'               => fake()->name(),
            'description'        => fake()->paragraph( 5 ),
        ];
    }
}
