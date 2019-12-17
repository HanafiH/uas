<?php

use App\Employees;
use App\Jobs;
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
        factory(Jobs::class,10)->create();
        factory(Employees::class,150)->create();
    }
}
