<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
       'diagnosis_id', 'medicine_id', 'dosage', 'note',
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }
    public function medicine()
    {
        return $this->hasOne(Medicine::class);
    }
}
