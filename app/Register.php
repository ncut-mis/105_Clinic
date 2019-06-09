<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    protected $table ='registers';

    protected $fillable =[
        'section_id', 'member_id','status','reservation_no','status','date','note',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
