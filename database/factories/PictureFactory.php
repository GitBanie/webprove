<?php

use Faker\Generator as Faker;

$factory->define(App\Picture::class, function (Faker $faker) use ($factory) {
    //http://lorempixel.com/
    $random = str_random(12);
    $link = $random . '.jpg';
    $file = file_get_contents($faker->imageUrl(800, 800));
    Storage::disk("local")->put($link, $file);

    return [

      // 'post_id' => $factory->create(App\Post::class)->id,
      'link' =>  $link,
      'title' => $faker->sentence(),

    ];
});
