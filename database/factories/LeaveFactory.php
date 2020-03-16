<?php

use Faker\Generator as Faker;

$factory->define(App\Leave::class, function (Faker $faker) {
    
    
    return [
        'user_id'=>rand(1,20),
        'leavetype_id'=>rand(1,20),
        
        'fh_from'=>$faker->dateTime($max = 'now', $timezone = null),
        'fh_to'=>$faker->dateTime($max = 'now', $timezone = null),
        'description'=>$faker->text(500),

        'resp_status'=>$faker->randomElement(['AUTORIZADO','RECHAZADO','EN ESPERA']),
        'resp_msg'=>$faker->text(500),
        'resp_chdate'=>$faker->dateTime($max = 'now', $timezone = null),
        'resp_name'=>$faker->name,
        
        'status'=>$faker->randomElement(['ACTIVO','SUSPENDIDO']),
        

    ];
});
