<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'title' => fake()->sentence(5),
            'description' => fake()->text(500),
            'price' => fake()->randomFloat(2, 200, 3000)


        //     'title'=>fake()->sentence(5),
        //     'name' => fake()->name(),
        //     'description'=>fake()->text(100),
        //     'price'=>fake()->randomFloat(2, 200, 3000),
        //     // 'image' => fake()->image('public/assets/images',400,300, null, false) 
        //    'image'=> fake()->imageUrl(640, 480, 'animals', true),
        //    'is_active'=>fake()->boolean()
        ];
    }
}
