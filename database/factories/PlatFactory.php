<?php

namespace Database\Factories;

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
            'nom' =>  $this->faker->sentence,
            'contenue' => Str::contenue($this->faker->sentence),
            'description' => $this->faker->paragraph,
            'image' => 'https://picsum.photos/600/400',
            'id_categorie' => factory(Category::class),
            'prix' => $this->faker->numberBetween($min=100, $max=500)
        ];
    }
}
