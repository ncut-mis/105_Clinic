<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as Staff;


class Clinic extends Model
{
    protected $table ='clinics';
    protected $fillable = [
        'name', 'tel', 'address','photo','reservable_day','per_week_sections'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}
