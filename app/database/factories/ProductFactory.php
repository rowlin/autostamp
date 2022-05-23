<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'code' =>$faker->word,
        'name' => $faker->text(100),
        'description' => $faker->text(300),
        'image' => NULL ,
    ];
});
