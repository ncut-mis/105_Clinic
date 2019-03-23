<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Clinic as ClinicEloquent;

class Staff extends Model
{
    protected $table ='staff';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
