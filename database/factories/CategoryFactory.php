<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = mb_strtolower($this->faker->unique()->lastName);

        return [
            'name' => ucfirst($name),
            'store_id' => 1,
            'parse_url' => 'example.com/' . Str::slug($name, '-'),
            'friendly_url_name' => Str::slug($name, '-'),
        ];
    }
}
