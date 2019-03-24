<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table ='medicines';

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
