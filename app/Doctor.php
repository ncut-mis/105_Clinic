<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as Staff;



class Doctor extends Model
{

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function Diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
