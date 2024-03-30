<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = implode(' ', fake()->unique()->words());
        return [
            'user_id' => User::first()->id,
            'cover_id' => Media::where('kind', 'image')->first()->id,
            'bgm_id' => Media::where('kind', 'audio')->first()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => implode(' ', fake()->words(50))
        ];
    }
}
