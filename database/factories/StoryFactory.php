<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Story;
use Faker\Generator as Faker;

$factory->define(Story::class, function (Faker $faker) {
    $type = $faker->randomElement(['long', 'short']);
    $body = ($type == 'short') ? $faker->text(100) : $faker->paragraph();
    
    return [
        'user_id' => $faker->numberBetween(1,2),
        'title' => $faker->unique()->lexify('????????????'),
        'body' => $body,
        'type' => $type,
        'status' => $faker->boolean(),
    ];
});
