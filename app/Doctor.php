<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as Staff;



class Doctor extends Model
{
    protected $fillable = [
        'clinic_id', 'staff_id', 'clinic_date',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function diagnoses()
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

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
