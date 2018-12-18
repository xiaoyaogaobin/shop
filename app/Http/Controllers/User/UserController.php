<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Userrequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',[
            'only'=>['login','login_form','register','register_form','rest'],
        ]);
    }

    //加载首页
    public  function  login(){

        return view('home.user.login');
    }
    //登录验证处理
    public  function login_form(Request $request){
        $this->validate(
            $request,[
            'email' => 'required',
            'password' => 'required|min:3'
        ],[
                'email.email' => '手机不能为空',
                'password.required' => '请输入登录密码',
                'password.min' => '密码不得少于3位置'
            ]

        );
        $num = $request->only('email','password');
//        dd($num);
        //$request->remember 七天登录 记住我
        if (\Auth::attempt($num,$request->remember)){
//            dd($request->query('from'));
            if ($request->query('from')){
                return redirect($request->query('from'))->with('success','登录成功');

            }else{

                return redirect()->route('home')->with('success','登录成功');

            }
        }
        return redirect()->back()->with('danger','账号密码不匹配');
    }
    // 加载注册页面
    public  function  register(){
        return view('home.user.register');
    }
    //用户注册验证
    public function register_form(Userrequest $request){
        $data = $request->all();
        // 把密码加密存储到数据库里面
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        $num = $request->only('email','password');
//        dd($num);
        if (\Auth::attempt($num)){
            return redirect()->route('home')->with('success','登录成功');
        }
        return redirect()->route('home')->with('success','注册成功');

    }
    //用户重置密码加载模版
    public  function reset(){

        return view('home.user.reset');
    }
    //用户重置密码处理
    public function  reset_form(Request $request){

        $user = User::where('email',$request->email)->first();
        if ($user){
            $user->password = bcrypt($request->password);
            $user->save();
            // 成功跳转链接
            return redirect()->route('user.login')->with('success','密码重置成功');

        }
        return redirect()->back()->with('danger','该账户未注册');

    }
    //用户退出管理
    public function logout(){
//        dd(1);
        \Auth::logout();
        return redirect()->route('home')->with('success','退出成功');
    }


}
