<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Section as SectionEloquent;
use \App\Doctor as DoctorEloquent;
use \App\Medicine as MedicineEloquent;
use \App\Examination as ExaminationEloquent;
use \App\Staff as StaffEloquent;
use \App\Announcement as AnnouncementEloquent;

class Clinic extends Model
{
    protected $table ='clinics';

    public function section()
    {
        return $this->hasMany(SectionEloquent::class);
    }

    public function doctor()
    {
        return $this->hasMany(DoctorEloquent::class);
    }

    public function medicine()
    {
        return $this->hasMany(MedicineEloquent::class);
    }

    public function examination()
    {
        return $this->hasMany(ExaminationEloquent::class);
    }

    public function staff()
    {
        return $this->hasMany(StaffEloquent::class);
    }

    public function announcement()
    {
        return $this->hasMany(AnnouncementEloquent::class);
    }
}
