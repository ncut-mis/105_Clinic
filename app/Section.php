<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Section extends Model
{
    protected $table ='sections';
    protected $fillable = ['current_no'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
