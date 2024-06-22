<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     //  El factory tiene la estructura inicial de datos falsos
    public function definition(): array
    {
        return [
            //  esta linea se agrego despues para poder hacer relaciones entre las tablas
            'user_id' =>1,  
            
            'title'=> $title = $this->faker->sentence(),
            'slug'=>Str::slug($title),
            'body'=>$this->faker->text(2200),
        ];
    }
}
