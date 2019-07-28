<?php

use Faker\Generator as Faker;
use LaravelForum\Channel;

$factory->define(Channel::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        //
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
