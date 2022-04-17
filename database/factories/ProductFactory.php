<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->words($nb=2, $asText=true),
        'short-desc' => $faker->text(200),
        'description' => $faker->text(500),
        'price'=> $faker->numberBetween(10, 500),
        'discount' => $faker->numberBetween(5, 30),
        'quantity' => $faker ->numberBetween(10, 500),
        'brand_id'=> $faker ->numberBetween(1, 10),
        'category_id'=> $faker ->numberBetween(1, 7),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
    ];
});
