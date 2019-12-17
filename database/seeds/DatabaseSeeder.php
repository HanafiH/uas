<?php

use App\Employee;
use App\Job;
use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,1)->create();
        factory(Job::class,10)->create();
        factory(Employee::class,150)->create();
    }
}
