<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Http\Models\User::class, function (Faker $faker) {
	static $password;
	$date_time = $faker->date.' '.$faker->time;
    return [
        'real_name' => str_random(3),
        'name' => str_random(10),
        'email' => $faker->unique()->safeEmail,
        'password' => $password?:$password = bcrypt('secret'), // secret
        'remember_token' => str_random(10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'activated' => 1,
        'head' => 'http://log.test/uploads/images/head/default.jpg',
    ];
});
