<?php

use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Category::factory()->count(50)->create();
        
        $categories = Category::all();

        Product::factory()->count(5000)->create()->each(function ($product) use ($categories) {
            $product->category_id = $categories->random()->id;
            $product->save();
        });
    }
}
