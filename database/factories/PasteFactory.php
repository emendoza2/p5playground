<?php

use Faker\Generator as Faker;

$factory->define(App\Pastes::class, function (Faker $faker) {
    return [
        'unique_name' => implode('-', $faker->words()),
        'content' => $faker->randomHtml(5, 10)
    ];
});
