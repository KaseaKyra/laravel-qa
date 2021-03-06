<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\App;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(rand(3, 7), true),
        'user_id' => User::pluck('id')->random(),
        'vote_count' => rand(0, 5),
    ];
});
