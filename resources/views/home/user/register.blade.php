@extends('home.user.layouts.master')
    @section('title')
    <title>{{shop_config('website.site_name')}}注册</title>
    <script src="https://cdn.bootcss.com/layer/2.3/layer.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.bootcss.com/Swiper/4.4.2/css/swiper.min.css" rel="stylesheet">

    <style>
        .bg{
            background-color: #f9f1ed;
            border: #0C0C0C;
            color: blueviolet;
            font-size: 12px;
            font-family: bold;
        }
    </style>
    @endsection
</head>
@section('content')
<!--dengl-->
<div class="yiny">
    <div class="beij_center">
        <div class="dengl_logo">
            <img src="{{shop_config('website.site_logo')}}" width="214px" height="73px
">
            <h1>欢迎注册</h1>
        </div>
    </div>
</div>
<div class="beij_center">
    <div class="ger_zhuc_beij">
        <div class="ger_zhuc_biaot">
            <ul>
                <li class="ger_border_color"><a href="{{route('user.register')}}">搜易网注册</a></li>


                <p>我已经注册，现在就<a class="ftx-05 ml10" href="{{route('user.login')}}">登录</a></p>
            </ul>
        </div>
        <form action="{{route('user.register_form')}}" method="post">
            @csrf
        <div class="zhuc_biaod">
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">用户名：</label>
              	</span>
                <input   class="i-text" type="text" name="name" value="{{old('title')}}">
                <!--备注————display使用 inline-block-->


            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">设置密码：</label>
              	</span>
                <input   class="i-text" type="password" name="password">
                <!--备注————display使用 inline-block-->

            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">确认密码：</label>
              	</span>
                <input   class="i-text" type="password" name="password_confirmation">
                <!--备注————display使用 inline-block-->

            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">手机号码：</label>
              	</span>
                <input   class="i-text" type="text" id="iphone" value="15163640385" name="email">
                <!--备注————display使用 inline-block-->

            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name">验证码：</label>
              	</span>
                <input   class="i-text i-short" type="text" name="code">
                <div class="check check-border" style="position:relative;left:0">

                    <input type="button" id="code"  style="padding:9px 10px 12px 10px;border: none;" value="获取短信验证码" onclick="settime(this);">

                </div>
                <script type="text/javascript">

                    $(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });


                        $('#code').click(function () {
                            let iphone = $('#iphone').val()

                            if(!(/^1[34578]\d{9}$/.test(iphone))) {
                                swal({
                                    text: '请输入正确的手机号码',
                                    icon: "warning",
                                    button: false
                                });
                                return;
                            }

                            $.post("{{route ('util.code')}}",{iphone:iphone,'type':'register'},function (res) {
                                if (res.code ==0){
                                swal({
                                    text: res.message,
                                    icon: "success",
                                    button: false
                                });
                                }
                            },'json')
                        })
                    })
                    //倒计时
                    var countdown=60;
                    function settime(val) {

                        //数字加一
                        if (countdown == 0) {
                            val.removeAttribute("disabled");
                            $('#code').removeClass('bg');
                            val.value="获取验证码";
                            countdown = 60;
                            return false;
                        } else {
                            val.setAttribute("disabled", true);
                            $('#code').addClass('bg')
                            val.value="重新发送(" + countdown + ")";
                            countdown--;
                        }
                        setTimeout(function() {
                            settime(val);
                        },1000);
                        // 点击选中没效果
                        // 点击发送异步请求


                    }
                </script>
                <!--备注————display使用 inline-block-->
                <div class="msg-box">
                    <div class="msg-weak err-tips"  style="display:none;"><div>请输入短信验证码</div></div>
                </div>
            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
                <div class="dag_biaod">
                    <input type="checkbox" value="english" checked>
                    阅读并同意
                    <a href="#" class="ftx-05 ml10">《隐私协议》</a>
                </div>
            </div>
            <div class="reg-items" >
              	<span class="reg-label">
                	<label for="J_Name"> </label>
              	</span>
                <input class="reg-btn" value="立即注册" type="submit">
            </div>
        </div>
        </form>
        @include('layouts.message')
        <div class="xiaogg">
            <img src="{{asset('org/home')}}/images/cdsgfd.jpg">
        </div>
    </div>
</div>


@endsection
