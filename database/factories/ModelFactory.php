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
    ];
});

/**
 * seed test database with html page content for hypothetical admin pages.
 * IMPORTANT: FACTORY->DEFINE MAKES 1 INSTANCE..1 record! So assertsCount will fail if you don't account for this.
 */
$factory->define(App\Models\Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->text($maxNbChars = 20),
        'slug' => $faker->unique()->word,
        'htmlcode' => $faker->paragraph,
    ];
});
