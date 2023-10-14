<?php

namespace Database\Factories;

use App\Models\BlogPostTag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPostTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_post_id' => $this->faker->randomNumber,
            'blog_tag_id' => $this->faker->randomNumber,
        ];
    }
}
