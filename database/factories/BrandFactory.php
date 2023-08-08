<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        $brands = [
            'Nike',
            'Adidas',
            'Gucci',
            'Zara',
            'Levi\'s',
            'H&M',
            'Puma',
            'Calvin Klein',
            'Under Armour',
            'Vans',
        ];

        return [
            'brand' => $brands[$this->faker->numberBetween(0, count($brands) - 1)],
        ];
    }
}
