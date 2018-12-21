<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User as UserEloquent;
use \App\Register as RegisterEloquent;
use \App\Reservation as ReservationEloquent;
use \App\Examination as ExaminationEloquent;

class Patient extends Model
{
    protected $table ='patients';

    public function user()
    {
        return $this->belongsTo(UserEloquent::class);
    }

    public function register()
    {
        return $this->hasMany(RegisterEloquent::class);
    }

    public function reservation()
    {
        return $this->hasMany(ReservationEloquent::class);
    }

    public function examination()
    {
        return $this->hasMany(ExaminationEloquent::class);
    }
}
