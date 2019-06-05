<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Diagnosis extends Model
{
    protected $fillable = [
        'member_id', 'doctor_id', 'symptom','date'
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
