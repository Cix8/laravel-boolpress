<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $new_post = new Post();
            $new_post->category_id = rand(1,5);
            $new_post->title = $faker->sentence();
            $new_post->text = $faker->paragraph(rand(20, 30), false);
            $new_post->slug = Post::generatePostSlugFromTitle($new_post->title);

            $new_post->save();
        }
    }
}
