<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++) {
            $newDate = $faker->dateTime();

            $newPost = new Post();
            $newPost->title = $faker->sentence(8);
            $newPost->slug = Str::slug($newPost->title);
            $newPost->subtitle = $faker->sentence(6);
            $newPost->author = $faker->name;
            $newPost->text = $faker->text(500);
            $newPost->img = $faker->imageUrl(480, 320, 'nature');
            $newPost->created_at = $newDate;
            $newPost->updated_at = $newDate;
            
            $newPost->save();
        }
    }
}
