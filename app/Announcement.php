<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
{
    protected $table ='announcements';
    protected $fillable=[ 'clinic_id', 'title','content','datetime' ,];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
