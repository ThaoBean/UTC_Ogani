<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'brand' => $faker->unique()->words($nb=2, $asText=true),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
    ];
});
