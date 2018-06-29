<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        "content" => $faker->realText(random_int(50, 150)),
        "image" => $faker->imageUrl(600, 338),
        "created_at" => $faker->dateTimeThisDecade,
        "updated_at" => $faker->dateTimeThisDecade,
    ];
});
