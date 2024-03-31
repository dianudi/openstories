<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path = strtr('media/$random.png', ['$random' => Str::random(8)]);
        Storage::put($path, Http::get(fake()->imageUrl())->body());
        return [
            'user_id' => User::first()->id,
            'name' => implode(' ', fake()->words()),
            'storage_path' => $path,
            'thumb_path' => $path,
            'kind' => 'image',
            'caption' => implode(' ', fake()->words())
        ];
    }
}
