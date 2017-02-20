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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'article_id' => $faker->numberBetween(1, 10),
        'email' => $faker->unique()->safeEmail,
        'ip' => ip2long($faker->unique()->ipv4),
        'type' => 'comment',
        'user_id' => $faker->numberBetween(70000, 99999),
        'content' => $faker->paragraphs(1)[0],
    ];
});
