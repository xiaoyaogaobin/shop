
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>搜易商城网后台界面</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{asset('org/admin/css')}}/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="{{asset('org/admin/css')}}/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="{{asset('org/admin/css')}}/animate.css" rel="stylesheet">
    <link href="{{asset('org/admin/css')}}/style.css?v=4.1.0" rel="stylesheet">
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>

</head>

<body class="gray-bg">

<div class="lock-word animated fadeInDown">
</div>
<div class="middle-box text-center lockscreen animated fadeInDown" style="width: 300px !important;">
    <div>
        <div class="m-b-md">
            <img alt="image" class="img-circle circle-border" src="{{asset('org/admin/img/a1.jpg')}}">
        </div>
        <h3>souro-cn</h3>
        <p>欢迎您来到后台</p>
        <form class="m-t" role="form" action="{{route('admin.login')}}" method="post">
            @csrf
            <div class="form-group">
                <div class="">
                    <input type="number" name="username" placeholder="手机号" value="{{old('username')}}" class="form-control">

                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <input type="password"  name="password" placeholder="密码" class="form-control">

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary pull-left p-t-0" >
                        <input id="checkbox-signup" name="remember" type="checkbox" style="margin-top: 3px !important; margin-left: 3px !important;">
                        <label for="checkbox-signup"> 记住我 </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary block full-width">login</button>
        </form>
    </div>
</div>

<!-- 全局js -->
<script src="{{asset('org/admin/js')}}/jquery.min.js?v=2.1.4"></script>
<script src="{{asset('org/admin/js')}}/bootstrap.min.js?v=3.3.6"></script>

<!--统计代码，可删除-->
{{--错误框提示--}}
  @include('layouts.message')
</body>

</html>

