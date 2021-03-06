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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role' => mt_rand(0,1),
    ];
});

$factory->define(App\Pronostic::class, function (Faker\Generator $faker) {

    return [
        'id_match' => mt_rand(5302,5318),
        'user_id' => mt_rand(1,25),
        'score_stade' => mt_rand(5,50),
        'score_adv' => mt_rand(5,50),
        'remember_token' => str_random(10),
    ];
});
