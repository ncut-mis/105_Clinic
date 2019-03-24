<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table ='staff';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
