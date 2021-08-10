<?php

namespace Database\Factories;

use App\Models\BlogPostModels;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogPostModelsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPostModels::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText('200');
        $slug = Str::slug($title);
        $content = $this->faker->text(rand(1000,4000));
        $extra = $this->faker->text(rand(500,800));
        $isPublished = (rand(1,5)) < 5 ? 1 : 0;
        if ($isPublished){
            $publishedAt = Carbon::now();
        }else{
            $publishedAt = null;
        }


        return [
            'category_id' => rand(1,10),
            'user_id' => (rand(1,4))>1 ? 1 : 2,
            'title' => $title,
            'slug' => $slug,
            'content_raw' => $content,
            'content_html' => $content,
            'extra'  => $extra,
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
        ];
    }
}
