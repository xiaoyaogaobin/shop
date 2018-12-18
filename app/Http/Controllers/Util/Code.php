<?php

namespace App\Http\Controllers\Util;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Code extends Controller
{
    public function  ihpone($code,$phone,$type){

        $statusStr = array(
            "0" => "短信发送成功",
            "-1" => "参数不全",
            "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
            "30" => "密码错误",
            "40" => "账号不存在",
            "41" => "余额不足",
            "42" => "帐户已过期",
            "43" => "IP地址限制",
            "50" => "内容含有敏感词"
        );
        // 匹配正则替换
        $regularity = '/<(.*)>/';
        // 注册账号
        $str = shop_config('iphone.iphone_register');

        // 重置密码
        $reset_password =shop_config('iphone.iphone_reset');

        if ($type == 'register'){
            $smsapi = "http://api.smsbao.com/"; //短信网关
            $user = shop_config('iphone.iphone_user'); //短信平台帐号

            $pass = md5(shop_config('iphone.iphone_password')); //短信平台密码
            $content= preg_replace($regularity,$code,$str);//要发送的短信内容
            $phone = "$phone";
            $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
            $result =file_get_contents($sendurl) ;
            return $statusStr[$result];
        }else{
            $smsapi = "http://api.smsbao.com/"; //短信网关
            $user = shop_config('iphone.iphone_user'); //短信平台帐号
            $pass = md5(shop_config('iphone.iphone_password')); //短信平台密码
            $content=preg_replace($regularity,$code,$reset_password);//要发送的短信内容
            $phone = "$phone";
            $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
            $result =file_get_contents($sendurl) ;
            return $statusStr[$result];

        }

    }
    //接受验证码处理
    public function SendCode(Request $request){

        // 获得验证码
        $code = $this->randow();

//        dd($request->all());
        $this->ihpone($code,$request['iphone'],$request['type']);

        // 把code
        session()->put('code',['code'=>$code,'time'=>time()+3000000]);

        // 返回数据
        return ['code' => 0, 'message' => '验证码发送成功'];

        // 获得随机四位验证码

    }
    public function  randow($len = 6){
        // 定义
        $str = '';
        for($i=0;$i<$len;$i++){
            $str .= mt_rand(0,9);
        }
        return $str;
    }
}
