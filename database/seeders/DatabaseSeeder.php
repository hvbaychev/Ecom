<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Made;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Brand::factory()->times(10)->create();
        Category::factory()->times(10)->create();
        Color::factory()->times(10)->create();
        Gender::factory()->times(3)->create();
        Made::factory()->times(10)->create();
        Product::factory()->times(50)->create();
        Size::factory()->times(5)->create();
    }
}

