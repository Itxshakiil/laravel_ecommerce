<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'details' => $faker->paragraph(),
        'price' => $faker->randomFloat(2, 10, 9999),
        'quantity' => $faker->randomNumber(),
        'image' => 'https://picsum.photos/120/100',
    ];
});
