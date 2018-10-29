<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'title'   => $name,
        'slug'    => str_slug($name),
        'body'    => $faker->text,
        'user_id' => rand(1, 20)
    ];
});
