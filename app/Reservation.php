<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Patient as PatientEloquent;
use \App\Section as SectionEloquent;

class Reservation extends Model
{
    protected $table ='reservations';

    public function patient()
    {
        return $this->belongsTo(PatientEloquent::class);
    }

    public function section()
    {
        return $this->belongsTo(SectionEloquent::class);
    }
}
