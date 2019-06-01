<?php

namespace App\Http\Controllers;

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
        $notificationBuilder = new PayloadNotificationBuilder(Auth::user()->clinic->name.'診所通知');
        $notificationBuilder->setBody('您已過號，請回到診所重新掛號!')->setSound('default');
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
// return Array (key:token, value:errror) - in production you should remove from your database the tokens
        return redirect()->route('doctor.diagnosis',$patient);
    }
}
