<?php

namespace Database\Factories;

use App\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenderFactory extends Factory
{
    protected $model = Gender::class;

    public function definition()
    {

        $genders = [
            'Man',
            'Women',
            'Kid',
        ];


        return [
            'gender' => $genders[$this->faker->numberBetween(0, count($genders) - 1)],
        ];
    }
}
