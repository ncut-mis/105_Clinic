<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Patient as PatientEloquent;
use \App\Section as SectionEloquent;
use \App\Doctor as DoctorEloquent;
use \App\Prescription as PrescriptionEloquent;
use \App\Clinic as ClinicEloquent;

class Diagnosis extends Model
{
    protected $fillable = [
        'member_id', 'doctor_id', 'symptom',
    ];
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

    public function prescription()
    {
        return $this->hasMany(PrescriptionEloquent::class);
    }

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
