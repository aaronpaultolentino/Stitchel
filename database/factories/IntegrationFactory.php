<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Integrations;
use Faker\Generator as Faker;

$factory->define(Integrations::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'type' => $faker->randomElement(['gmail', 'jira', 'slack']),
        'data' => $faker->text,
    ];
});
