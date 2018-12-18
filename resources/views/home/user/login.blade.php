@extends('home.user.layouts.master')
@section('title')
    <meta charset="utf-8">
    <title>{{shop_config('website.site_name')}}登录</title>

    @endsection

@section('content')
<!--dengl-->
<div class="beij_center">
    <div class="dengl_logo">
        <img src="{{shop_config('website.site_logo')}}" width="214px" height="73px"/>
        <h1>欢迎登录</h1>
    </div>
</div>
<div class="dengl_beij">

    <div class="banner_xin">
        <img src="{{asset('org/home')}}/images/ss.jpg">
    </div>
    <div class="beij_center dengl_jvz">
        <div class="login_form">
            <div class="login_tab">
                <h2>欢迎登录</h2>
                <div class="dengl_erwm">
                    <a href="#"><img src="{{asset('org/home')}}/images/er_wm.png"></a>
                    <div class="tanc_erwm_kuang">
                        <img src="{{asset('org/home')}}/images/mb_wangid.png">
                        <div class="qrcode_panel">
                            <ul>
                                <li class="fore1">
                                    <span>打开</span>
                                    <a href="#" target="_blank"> <span class="red">手机通城</span></a>
                                </li>
                                <li>扫描二维码</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route('user.login_form',['from'=>request()->query('from')])}}" method="post">
                @csrf
            <div class="kengl_kuang">
                <div class="txt_kuang">
                    <input type="number" name="email" class="itxt"  placeholder="邮箱/用户名/已验证手机">
                    <input type="password" class="itxt" name="password"  placeholder="密码">
                </div>
                <div class="remember">
                    <div class="fl">
                        <input type="checkbox" name="remember"  >
                        <label for="autoLoginFlag">自动登录</label>
                    </div>
                    <div class="fr">
                        <a href="{{route('user.reset')}}" class="fl" target="_blank" title="忘记密码">忘记密码?</a>
                    </div>
                </div>
                <input type="submit" tabindex="5" value="登 录" class="btnnuw">
            </div>
            </form>
            <div class="corp_login">
                <div class="mingb_shoq"><a href="#">名榜授权登录！</a></div>
                <div class="regist_link"><a href="{{route('user.register')}}" target="_blank"><b></b>立即注册</a></div>
            </div>
        </div>
    </div>
</div>
    @include('layouts.message')

@endsection
