<?php

namespace Database\Factories;

use App\Models\Plat;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plat>
 */
class PlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'namePlat' =>  $this->faker->sentence,
            'descriptionPlat' => $this->faker->paragraph,
            'imagePlat' => 'https://picsum.photos/600/400',
            'pricePlat' =>  $this->faker->numberBetween($min=100, $max=500),
            'category_id' => Category::factory(), //'id_categorie' => factory(Category::class), 
        ];
    }
}
