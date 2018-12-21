<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Clinic as ClinicEloquent;

class Announcement extends Model
{
    protected $table ='announcements';

    public function clinic()
    {
        return $this->belongsTo(ClinicEloquent::class);
    }
}
