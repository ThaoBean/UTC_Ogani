<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category' => $faker->unique()->words($nb=2, $asText=true),
        'image' => $faker->image('public/storage/images', 270, 270, null, false),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
    ];
});
