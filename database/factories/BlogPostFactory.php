<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text,
            'featured_image' => $this->faker->text(255),
            'is_featured' => $this->faker->boolean,
            'meta' => [],
            'author' => \App\Models\User::factory(),
            'blog_category_id' => \App\Models\BlogCategory::factory(),
        ];
    }
}
