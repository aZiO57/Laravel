<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->text(50);
        return [
            'title' => $title,
            'content' => $this->faker->text(500),
            'image' => 'https://skelbiu-img.dgn.lt/1_22_3375093055/parduodu-nauja-gumine-valti-promarine.jpg',
            'user_id' => rand(1, 310),
            'slug' => Str::slug($title),
            'views' => rand(1, 300),
            'category_id' => 1,
            'active' => 1,
            'vin' => Str::random(15),
            'price' => $this->faker->randomFloat(null, 130, 2000),
            'model_id' => rand(1, 2),
            'manufacturer_id' => rand(1, 2),
            'years' => rand(1990, 2010),
            'type_id' => rand(1, 2),
            'color_id' => rand(1, 13),
        ];
    }
}
