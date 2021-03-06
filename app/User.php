<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'staff';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function position()
    {
        return $this->hasOne(Position::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function medicines()
    {
        return $this->hasMany(ExamineMedicine::class);
    }
}
