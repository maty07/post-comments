<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'message' => $faker->text,
        'post_id' => rand(1, 100),
        'user_id' => rand(1, 20)
    ];
});
