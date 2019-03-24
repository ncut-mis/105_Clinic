<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    protected $table ='registers';

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
