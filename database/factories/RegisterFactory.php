<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(App\Register::class, function (Faker $faker) {
    return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName                                  ,
            'email' => $this->faker->unique()->safeEmail,
            'location' =>$this->faker->city , 
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                                          
            'date_of_birth'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
