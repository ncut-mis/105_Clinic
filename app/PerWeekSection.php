<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerWeekSection extends Model
{
    protected $fillable = [
        'doctor_id', 'weekday', 'start_time','end_time','from','suspense_from','suspense_to'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


}
