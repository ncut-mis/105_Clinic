<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Post as PostEloquent;

class Admin extends Model
{
    protected $table ='admins';

    public function post()
    {
        return $this->hasMany(PostEloquent::class);
    }
}
