<?php

namespace Database\Factories;

use App\Models\Made;
use Illuminate\Database\Eloquent\Factories\Factory;

class MadeFactory extends Factory
{
    protected $model = Made::class;

    public function definition()
    {
        // Списък с няколко държави-производители на английски език
        $countries = [
            'Italy',
            'Germany',
            'France',
            'Spain',
            'United States',
            'China',
            'Japan',
            'India',
            'Brazil',
            'Canada',
        ];

        // Връща случайно избрана държава-производител от списъка
        return [
            'made' => $countries[$this->faker->numberBetween(0, count($countries) - 1)],
        ];
    }
}
