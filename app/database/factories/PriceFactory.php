<?php

use Faker\Generator as Faker;

$factory->define(\App\Price::class, function (Faker $faker) {
    return [
        'product_id' => function() {
            return \App\Product::first()->id ??  factory(App\Product::class)->create()->id;
        } ,
        'store_id' =>  function() {
            return \App\Store::first()->id ?? Null;
        } ,
        'price' => $faker->randomFloat(2, 0, 10000),
        'starts_at' => $faker->date('Y-m-d H:i:s')
    ];
});
