<?php

/** @var Factory $factory */

use App\Question;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(5, 10)), '. \t\n\r\0\x0B'),
        'body' => $faker->paragraphs(rand(3, 7), true),
        'view' => rand(0, 5),
//        'answer_count' => rand(0, 5),
        'vote' => rand(0, 5),
    ];
});

