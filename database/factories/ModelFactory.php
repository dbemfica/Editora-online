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
$factory->define(\App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => ucwords($faker->unique()->word),
    ];
});

$factory->define(\App\Models\Book::class, function (Faker\Generator $faker) {

    $repository = app(\App\Repositories\UserRepository::class);
    $authorId = $repository->all()->random()->id;

    return [
        'title' => $faker->word,
        'author_id' => $authorId,
        'subtitle' => $faker->sentence(),
        'price' => $faker->randomNumber(2),
    ];
});