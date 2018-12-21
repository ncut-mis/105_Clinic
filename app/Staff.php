<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Clinic as ClinicEloquent;

class Staff extends Model
{
    protected $table ='staff';

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
