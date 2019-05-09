<?php
namespace App\Repositories;
use App\Staff;
use App\Medicine;
class MedicineRepository
{
    /**
     * 取得給定使用者的所有任務。
     *
     * @param  User  $user
     * @return Collection
     */
    public function forClinic(Clinic $clinic)
    {
        return Medicine::where('clinic_id', $clinic->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
