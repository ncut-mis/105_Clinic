<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }
}
