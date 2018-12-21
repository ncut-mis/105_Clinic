<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Patient as PatientEloquent;
use \App\Section as SectionEloquent;

class Register extends Model
{
    protected $table ='registers';

    public function patient()
    {
        return $this->belongsTo(PatientEloquent::class);
    }

    public function section()
    {
        return $this->belongsTo(SectionEloquent::class);
    }
}
