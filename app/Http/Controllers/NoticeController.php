<?php

namespace App\Http\Controllers;

use App\Register;
use App\Section;
use Illuminate\Http\Request;
use Auth;
use App\Member as Patient;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class NoticeController extends Controller
{
    public function late(Patient $patient)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $notificationBuilder = new PayloadNotificationBuilder('診所通知');
        $notificationBuilder->setBody('您已過號，若要看診煩請回到診所重新掛號!')->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $token = "fXBRQnqdcVo:APA91bEVvrBRXL7VyCiIikWeQFPvk7VvH4KUmFuh1pZFItkRaREdWkHOYhp6PBBsU5NxV9CtXCGbWSn631kNAvz6few6cEsrU-0qkvkgPSz_Vg5g-SgAS5eXGiC-QrNBr5_uZTjar5Qm";
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
//        return redirect()->route('doctor.diagnosis',$patient);
    }

    public function number(Section $current_section,Register $register,Patient $patient)
    {
//        $optionBuilder = new OptionsBuilder();
//        $optionBuilder->setTimeToLive(60*20);
//        $notificationBuilder = new PayloadNotificationBuilder(Auth::user()->clinic->name.'通知');
//        $notificationBuilder->setBody('目前看診號碼為'.$current_section->current_no.'號,還有'.$register->reminding_no.'位就輪到您囉')->setSound('default');
//        $dataBuilder = new PayloadDataBuilder();
//        $dataBuilder->addData(['a_data' => 'my_data']);
//        $option = $optionBuilder->build();
//        $notification = $notificationBuilder->build();
//        $data = $dataBuilder->build();
//        $token = "fYaSghNWxMY:APA91bEdW_uSrWmQZvVjlYHQ0SYumSjmO0-18hyM2PE9VFIHbeDSTNNVtmp-zJ-uRJ20Y1YgMPreVbabExE1Gnfmybw72d0bCUBMZfMNVLW4CqcaCxawkxabYAYCKvsGsUmZVOIp5oaO";
//        $token = "fXBRQnqdcVo:APA91bEVvrBRXL7VyCiIikWeQFPvk7VvH4KUmFuh1pZFItkRaREdWkHOYhp6PBBsU5NxV9CtXCGbWSn631kNAvz6few6cEsrU-0qkvkgPSz_Vg5g-SgAS5eXGiC-QrNBr5_uZTjar5Qm";
//        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
//        $downstreamResponse->numberSuccess();
//        $downstreamResponse->numberFailure();
////return Array - you must remove all this tokens in your database
//        $downstreamResponse->tokensToDelete();
////return Array (key : oldToken, value : new token - you must change the token in your database )
//        $downstreamResponse->tokensToModify();
////return Array - you should try to resend the message to the tokens in the array
//        $downstreamResponse->tokensToRetry();
//// return Array (key:token, value:error) - in production you should remove from your database the tokens
//        return redirect()->route('doctor.diagnosis',$patient);
    }

    public function time()
    {
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y-m-d");
        $time=date("H:i");
//      $today_section=Section::where('date',$date)->where('start',[$time,strtotime('+2 hours')])->get();
        $current_section=Section::where('date',$date)->where('start','>',$time)->get();//今天尚未開始看診的時段
//        dd($current_section) ;
        foreach ($current_section as $current)
        {
            $registers=$current->registers()->get();
//            echo $registers;
            foreach ($registers as $register)
            {
//                echo $register->reminding_time;
            if($register->reminding_time!=="00:00:00")
            {
//                echo $current->start;
//                echo $register->reminding_time;
                  $if_equal_time=(strtotime($current->start)-strtotime($register->reminding_time))/3600;//相差幾小時
//                $if_equal_time = ($current->start - $register->reminding_time)/60;
//                dd(date("H:i:s",$register->reminding_time))  ;
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
                    $token = "dqp9esKsFTA:APA91bG7IEtk_Cw7Ivi-RqqSmfAZLTt4mZ8PSwJ6HxKmnBcsE3IaAUfdAjsy00yfwVkR_5dQhG2XdmPJqnG1WaxUS_Xj1HWJjrtQXIO1ddLAEKOLHj56BFgKXdiQ1BpPrprUhaeTnS5t";
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
