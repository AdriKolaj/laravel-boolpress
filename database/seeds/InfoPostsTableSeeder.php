<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\InfoPost;
use Faker\Generator as Faker;

class InfoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();

        foreach($posts as $post) {
            $newInfoPost = new InfoPost();
            $newInfoPost->post_id = $post->id;
            $newInfoPost->post_status = $faker->randomElement(['public', 'private', 'draft']);
            $newInfoPost->comments_status = $faker->randomElement(['open', 'closed', 'private']);

            $newInfoPost->save();
        }
    }
}
