<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Post::class, function (Faker $faker) use ($factory) {

  $year = 2018;
  $month = rand(1, 12);
  $day = rand(1, 28);
  $date = Carbon::create($year,$month ,$day);


    return [
      'category_id' => random_int(\DB::table('categories')->min('id'), \DB::table('categories')->max('id')),
      'post_type' => $faker->randomElement(['stage' ,'formation']),
      'title' => $faker->sentence(),
      'description' => $faker->paragraph(),
      'started_at' => $date->format('Y-m-d H:i:s'),
      'ended_at' => $date->addWeeks(rand(4, 48))->format('Y-m-d H:i:s'),
      'price' => $faker->randomFloat(2, 100, 3000),
      'students_max' => rand(10,30),
      'status' => $faker->randomElement(['published' ,'unpublished']),
    ];
});
