<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table ='staff';
    protected $fillable = [
        'clinic_id', 'position_id', 'name', 'photo','email', 'password','created_at'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function position()
    {
        return $this->hasOne(Position::class);
    }
}
