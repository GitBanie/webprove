<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Post::class, 20)->create();
        
        # Suppression de toutes les images, puis lancement de la factory en reliant chaque ID
        Storage::disk('local')->delete(Storage::allFiles());

        factory(App\Post::class, 20)->create()->each(function ($post) {
                factory(App\Picture::class)->create(['post_id' => $post->id]);
                }
        );
    }
}
