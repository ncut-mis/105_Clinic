<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Section as SectionEloquent;
use \App\Examination as ExaminationEloquent;
use \App\Clinic as ClinicEloquent;


class Doctor extends Model
{

    public function section()
    {
        return $this->hasMany(SectionEloquent::class);
    }

    public function examination()
    {
        return $this->hasMany(ExaminationEloquent::class);
    }

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
