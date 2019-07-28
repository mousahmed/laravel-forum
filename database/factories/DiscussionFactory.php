<?php

use Faker\Generator as Faker;
use LaravelForum\Channel;
use LaravelForum\Discussion;

$factory->define(Discussion::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        //
        'title' => $title,
        'content' => $faker->paragraph('50','100'),
        'slug'=> str_slug($title),
        'channel_id' => $faker->numberBetween(1,Channel::count()),
    ];
});
