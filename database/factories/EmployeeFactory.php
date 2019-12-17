<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Employee;
use App\Job;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $jobsID = DB::table('jobs')->pluck('id_jobs');
    
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'id_jobs' => $faker->randomElement($jobsID),
    ];
});
