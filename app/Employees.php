<?php

namespace App;
use App\Jobs;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'id_jobs','name','email','phone','address'
    ];

    public function jobs()
    {
        return $this->belongsTo('App\Jobs');
    }
}
