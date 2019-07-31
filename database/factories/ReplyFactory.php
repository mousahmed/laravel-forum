<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use LaravelForum\Discussion;
use Faker\Generator as Faker;
use LaravelForum\Reply;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        //
        'content' => $faker->paragraph(5,20),
        'discussion_id'=> $faker->numberBetween(1,Discussion::count()),
    ];
});
