<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $name = mb_strtolower(fake()->firstName());
        return [
            'name' => ucfirst($name),
            'sku' => fake()->unique()->numberBetween(10000, 10000000),
            'store_id' => 1,
            'parse_url' => 'example.com/' . Str::slug($name, '-'),
            'friendly_url_name' => Str::slug($name, '-') . '-' . fake()->unique()->numberBetween(),
            'price' => fake()->numberBetween(10000, 1000000),
            'img_url' => $this->faker->imageUrl(300, 250),
            'description' => fake()->text(rand(150, 350)),
            'weight' => fake()->numberBetween(50, 50000),
            // 'category_id' => 
        ];
    }
}
