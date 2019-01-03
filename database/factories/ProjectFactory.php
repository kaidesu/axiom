<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'owner_id'    => function() {
            return factory(App\User::class)->create()->id;
        },
        'title'       => $faker->word,
        'description' => $faker->sentence,
    ];
});
