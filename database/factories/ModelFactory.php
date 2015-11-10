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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Page::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(),
        'user_id' => App\Models\User::all()->lists('id'),
        'page_title' => $faker->sentence(),
        'meta_keyword' => implode(',', $faker->words()),
        'meta_description' => $faker->text(),
        'active' => $faker->boolean(),
    ];
});