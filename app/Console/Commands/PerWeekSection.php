<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class PerWeekSection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adjust:section';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adjust the perweeksetion to section for the doctor' ;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y-m-d");
        $perweeksections=\App\PerWeekSection::where('date','>',$date)->orderBy('doctor_id','asc')->orderBy('date','asc')->get();
        foreach ($perweeksections as $perweeksection)
            DB::table('sections')->insert([
                'clinic_id' =>$perweeksection->doctor->clinic_id,
                'doctor_id' =>$perweeksection->doctor_id,
                'date' =>$perweeksection->date,
                'start' =>$perweeksection->start_time,
                'end' =>$perweeksection->end_time,
                'current_no' =>0,
            ]);
             DB::table('sections')->where('date','<',$date)->delete();
    }
}
