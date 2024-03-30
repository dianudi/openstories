<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Story;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>  Hash::make('password')
        ]);
        Media::factory(10)->create();

        $path = strtr('media/$random.mp3', ['$random' => Str::random(8)]);
        Storage::put($path, Http::get('https://www.chosic.com/wp-content/uploads/2021/02/keys-of-moon-white-petals(chosic.com).mp3')->body());
        Media::factory()->create([
            'user_id' => User::first()->id,
            'name' => 'Keys of moon white petals',
            'storage_path' => $path,
            'kind' => 'audio',
            'caption' => 'Bgm Audio'
        ]);

        Story::factory(20)->create();
    }
}
