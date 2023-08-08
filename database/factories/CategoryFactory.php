<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $clothingTypes = [
            'Dresses',
            'Shoes',
            'Tops',
            'Jeans',
            'Skirts',
            'Shirts',
            'Jackets',
            'Pants',
            'Sweaters',
            'Shorts',
        ];

        return [
            'category' => $clothingTypes[$this->faker->numberBetween(0, count($clothingTypes) - 1)],
        ];

    }
}
