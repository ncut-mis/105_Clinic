<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
    protected $table ='admins';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
