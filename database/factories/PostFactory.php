<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->name(),
            "preview" => $this->faker->text(15),
            "description" => $this->faker->text(),
            "thumbnail" => $this->faker->image("storage/posts/")
        ];
    }
}
