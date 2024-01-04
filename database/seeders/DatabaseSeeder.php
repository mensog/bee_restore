<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::factory()->count(20)->create()->toArray();
        
        Product::factory()->count(50)->make()->each(function ($product) use ($categories) {
            $product->category_id = Arr::random($categories)['id'];
            $product->save();
        });
    }
}
