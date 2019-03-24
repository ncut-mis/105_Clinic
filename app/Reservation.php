<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Patient as PatientEloquent;
use \App\Section as SectionEloquent;

class Reservation extends Model
{
    protected $table ='reservations';

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
