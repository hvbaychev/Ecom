<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    protected $model = Color::class;

    public function definition()
    {
        // Списък с 10 различни цвята на английски език
        $colors = [
            'Red',
            'Blue',
            'Green',
            'Yellow',
            'Purple',
            'Orange',
            'Pink',
            'Brown',
            'Black',
            'White',
        ];

        // Връща случайно избран цвят от списъка
        return [
            'color' => $colors[$this->faker->numberBetween(0, count($colors) - 1)],
        ];
    }
}
