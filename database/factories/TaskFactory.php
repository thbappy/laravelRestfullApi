<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Task;
use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'name' => $faker->unique()->name,
        'description' => $faker->text,
        'user_id' => $faker->randomElement($users)
    ];
});
