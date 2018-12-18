<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    @yield('title')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('org/home')}}/css/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset('org/home')}}/css/ziy.css">

</head>
<body>
@yield('content')


<div class="jianj_dib jianj_dib_1">
    <div class="beia_hao">
        <p>京ICP备：{{shop_config('website.site_icp')}}号 黔ICP证：B2-20140009号  </p>

    </div>
</div>

</body>
</html>
