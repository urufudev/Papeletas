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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'dni'=>$faker->numberBetween($min = 10000000, $max = 99999999),
        'ap_paterno'=>$faker->lastName,
        'ap_materno'=>$faker->lastName,
        'gender'=>$faker->randomElement(['MASCULINO','FEMENINO']),
        'f_birth'=>$faker->dateTime($max = 'now', $timezone = null),
        'office_id'=>rand(1,20),
        'position'=>$faker->text(10),
        'regime'=>$faker->randomElement(['DECRETO LEGISLATIVO N° 276','DECRETO LEGISLATIVO N° 1057',
        'LEY N° 29944','LEY N° 30512','LEY N° 30328','LEY N° 30493']),
        'phone'=>$faker->phoneNumber,
        'status'=>$faker->randomElement(['ACTIVO','SUSPENDIDO']),
        
        

        'remember_token' => str_random(10),
    ];
});
