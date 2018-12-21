<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Reservation as ReservationEloquent;
use \App\Register as RegisterEloquent;
use \App\Examination as ExaminationEloquent;
use \App\Doctor as DoctorEloquent;
use \App\Clinic as ClinicEloquent;

class Section extends Model
{
    protected $table ='sections';

    public function reservation()
    {
        return $this->hasMany(ReservationEloquent::class);
    }

    public function register()
    {
        return $this->hasMany(RegisterEloquent::class);
    }

    public function examination()
    {
        return $this->hasMany(ExaminationEloquent::class);
    }

    public function doctor()
    {
        return $this->belongsTo(DoctorEloquent::class);
    }

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
