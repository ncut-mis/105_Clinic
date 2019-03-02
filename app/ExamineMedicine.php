<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamineMedicine extends Model
{
    protected $table = 'examine_medicines';

    protected $fillable = ['medicine','note1','note2'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
