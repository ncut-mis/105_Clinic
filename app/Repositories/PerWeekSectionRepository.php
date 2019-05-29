<?php
namespace App\Repositories;
use App\PerWeekSection;
class PerWeekSectionRepository
{
    /**
     * 取得給定使用者的所有任務。
     *
     * @param  User  $user
     * @return Collection
     */
    public function forDoctor(Doctor $doctor)
    {
        return PerWeekSection::where('doctor_id', $doctor->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
