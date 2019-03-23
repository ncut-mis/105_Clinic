<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'member_id', 'doctor_id', 'symptom',
    ];
}
