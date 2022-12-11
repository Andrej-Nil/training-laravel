<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl(200, 150,'cats'),
            'likes' => random_int(1, 2000),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}
