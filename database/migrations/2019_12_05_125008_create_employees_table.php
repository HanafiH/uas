<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            // $table->('id_employees'); big integer AUTO INCREMENT
            $table->bigIncrements('id_employees');
            // $table->('id_jobs')->unsigned(); big integer
            $table->unsignedBigInteger('id_jobs');
            // $table->('name'); string
            $table->string('name');
            // $table->('email'); string
            $table->string('email');
            // $table->('phone'); string
            $table->string('phone');
            // $table->('address'); string
            $table->string('address');
            $table->timestamps();

            $table->foreign('id_jobs')->references('id_jobs')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
