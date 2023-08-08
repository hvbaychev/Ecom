<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender_id' => rand(1, 3),
            'category_id' => rand(1, 5),
            'brand_id' => rand(1, 10),
            'description' => $this->faker->text,
            'color_id' => rand(1, 8),
            'made_id' => rand(1, 4),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'pic1' => $this->faker->imageUrl(),
            'pic2' => $this->faker->imageUrl(),
            'pic3' => $this->faker->imageUrl(),
            'pic4' => $this->faker->imageUrl(),
        ];
    }
}
