<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Examination as ExaminationEloquent;
use \App\Clinic as ClinicEloquent;

class Medicine extends Model
{
    protected $table ='medicines';

    public function examination()
    {
        return $this->belongsTo(ExaminationEloquent::class);
    }

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
