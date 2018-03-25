<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function send(Request $request)
    {
        date_default_timezone_set("PRC");

        if(time()-Cache::get('send_time')<60){

            return $this->error('120');

        }
        $name = '用户';

        $to = $request->username;

        $validate_code= str_random(4);

        Cache::put('validate_code',$validate_code,2);

        Cache::put('username',$to,2);
        // Mail::send()的返回值为空，所以可以其他方法进行判断
        try {

            Cache::put('send_time',time(),2);

            Mail::send('email', ['name' => $name,'validate_code'=>$validate_code], function ($message) use ($to){
                $message->to($to)->subject('hzj233-注册验证码');
            });

        }
        catch (\Exception $e){

           return $this->error();
        }

        return $this->success();
    }



}
