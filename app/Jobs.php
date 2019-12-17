<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'name'
    ];

    public function employees(){
        return $this->hasMany('App\Employees','id_employees');
    }
}
