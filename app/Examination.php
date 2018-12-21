<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Patient as PatientEloquent;
use \App\Section as SectionEloquent;
use \App\Doctor as DoctorEloquent;
use \App\Medicine as MedicineEloquent;
use \App\Clinic as ClinicEloquent;

class Examination extends Model
{
    protected $table ='examinations';

    public function patient()
    {
        return $this->belongsTo(PatientEloquent::class);
    }

    public function section()
    {
        return $this->belongsTo(SectionEloquent::class);
    }

    public function doctor()
    {
        return $this->belongsTo(DoctorEloquent::class);
    }

    public function medicine()
    {
        return $this->hasMany(MedicineEloquent::class);
    }

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
