<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => 'test@test.io',
        'password' => bcrypt('test'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'order' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'order' => $faker->randomDigitNotNull,
        'is_locked' => array_rand([1,0,0,0,0,0]),
        'is_official' => array_rand([1,0,0,0]),
        'topics' => $faker->randomNumber(2),
    ];
});
