<?php

use Faker\Generator as Faker;

$factory->define(App\Http\Models\Group::class, function (Faker $faker) {
	$date_time = $faker->date . ' ' . $faker->time;
    return [
        'name' => str_random(10),
        'create_id' => 1,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
