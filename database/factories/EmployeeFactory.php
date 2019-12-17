<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Employees;
use App\Jobs;
use Faker\Generator as Faker;

$factory->define(Employees::class, function (Faker $faker) {
    $jobsID = DB::table('jobs')->pluck('id_jobs');
    
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'id_jobs' => $faker->randomElement($jobsID),
    ];
});
