<?php

namespace App\Console\Commands;

use App\Member;
use Illuminate\Console\Command;


class Reminding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notice:time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notice of time to reminding member';

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
        $time=date("H:i");
        $current_section=Section::where('date',$date)->where('start','>',$time)->get();//今天尚未開始看診的時段
        foreach ($current_section as $current)
        {
            $registers=$current->registers()->get();
            foreach ($registers as $register)
            {
                if($register->reminding_time!==null||$register->reminding_time!=="00:00:00")
                {
                    $if_equal_time=(strtotime($current->start)-strtotime($register->reminding_time))/3600;//相差幾小時;
                    $hour=date("H");//目前的小時
                    if($hour=== "$if_equal_time")
                    {
                        $optionBuilder = new OptionsBuilder();
                        $optionBuilder->setTimeToLive(60*20);
                        $notificationBuilder = new PayloadNotificationBuilder( $current->clinic->name.'通知');
                        $notificationBuilder->setBody('目前時間為'.$time.',距離門診開始時間尚有'.$register->reminding_time.'小時')->setSound('default');
                        $dataBuilder = new PayloadDataBuilder();
                        $dataBuilder->addData(['a_data' => 'my_data']);
                        $option = $optionBuilder->build();
                        $notification = $notificationBuilder->build();
                        $data = $dataBuilder->build();
                        $member = Member::where('id',$register->memeber_id)
                            ->value('token')
                            ->toArray();
                        $token = $member;
                        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
                        $downstreamResponse->numberSuccess();
                        $downstreamResponse->numberFailure();
                        //return Array - you must remove all this tokens in your database
                        $downstreamResponse->tokensToDelete();
                        //return Array (key : oldToken, value : new token - you must change the token in your database )
                        $downstreamResponse->tokensToModify();
                        //return Array - you should try to resend the message to the tokens in the array
                        $downstreamResponse->tokensToRetry();
                        // return Array (key:token, value:error) - in production you should remove from your database the tokens
                    }
                }
            }
        }
    }
}
