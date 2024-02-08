<?php

namespace Database\Factories;

use App\Enums\CountriesEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeroSlide>
 */
class HeroSlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'countries' => CountriesEnum::cases(),
            'title' => fake()->title,
            'description' => fake()->text(160),
            'link' => '#',
            'order' => fake()->numberBetween(10, 1000),
            'delay' => 5000
        ];
    }
}
