<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Admin as AdminEloquent;

class Post extends Model
{
    protected $table ='posts';

    public function admin()
    {
        return $this->belongsTo(AdminEloquent::class);
    }
}
