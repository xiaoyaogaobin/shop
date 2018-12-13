<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //加载登录页面

    public function index()
    {

        return view('admin.login.index');
    }


    // 提交登录页面注册
    public function login(LoginRequest $request)
    {

        if (\Auth::guard('admin')->attempt(['username' => $request->username,'password' => $request->password],$request->remember)){

            //登录成功跳转
            return redirect()->route('admin.index')->with('success','登录成功');

        }

        return redirect()->back()->with('danger','登录失败');
    }

    //注销登录
    public function loginout(){
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','退出成功');
    }
}
