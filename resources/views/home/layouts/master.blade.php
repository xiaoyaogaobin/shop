<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    @yield('title')
    <meta name="keywords" content="{{shop_config('website.site_keywords')}}">
    <meta name="description" content="{{shop_config('website.site_description')}}">
    @stack('jscon')
    @stack('css')
    @stack('jsyb')
    <link rel="stylesheet" type="text/css" href="{{asset('org/home/css')}}/index.css">
    <link rel="stylesheet" type="text/css" href="{{asset('org/home')}}/css/ziy.css">
    <script src="{{asset('org/home/js')}}/jquery-1.11.3.min.js"></script>
    <script src="{{asset('org/home/js')}}/index.js"></script>

    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>

    <script type="text/javascript" src="{{asset('org/home/js')}}/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{asset('org/home/js')}}/jquery.SuperSlide.2.1.1.source.js"></script>
</head>
<body>
<!--侧边-->
<div class="jdm-toolbar-wrap J-wrap">
    <div class="jdm-toolbar J-toolbar">
        <div class="jdm-toolbar-panels J-panel"></div>
        <div class="jdm-toolbar-tabs J-tab">
            <div data-type="bar" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-ger">
                <i class="tab-ico"></i>
                <em class="tab-text">购物车</em>
            </div>
            <div data-type="bar" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-cart">
                <i class="tab-ico"></i>
                <em class="tab-text">购物车</em>
            </div>
            <div data-type="bar" clstag="h|keycount|cebianlan_h_follow|btn"
                 class="J-trigger jdm-toolbar-tab jdm-tbar-tab-follow" data-name="follow" data-login="true">
                <i class="tab-ico"></i>
                <em class="tab-text">我的关注</em>
            </div>
        </div>
        <div class="J-trigger jdm-toolbar-tab jdm-tbar-tab-message" data-name="message"><a target="_blank" href="#">
                <i class="tab-ico"></i>
                <em class="tab-text">我的消息
                </em></a>
        </div>
    </div>
    <div class="jdm-toolbar-footer">
        <div data-type="link" id="#top" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-top">
            <a href="#" clstag="h|keycount|cebianlan_h|top">
                <i class="tab-ico"></i>
                <em class="tab-text">顶部</em>
            </a>
        </div>
    </div>
    <div class="jdm-toolbar-mini"></div>
    <div id="J-toolbar-load-hook" clstag="h|keycount|cebianlan_h|load"></div>
</div>


<!--头部-->
<div id="header">
    <div class="header-box">
        <h3 class="huany">{{shop_config('website.site_name')}}购物商城欢迎您的到来！</h3>
        <ul class="header-left">
            <li class="bj">
                <a class="dib" href="#">贵阳市</a>
                <i class="ci-leftll">
                    <s class="jt">◇</s>
                </i>
                <div class="bj-1">
                    <h3>热门城市：</h3>
                    <a href="">北京</a><a href="">上海</a><a href="">天津</a><a href="">重庆</a><a href="">河北</a><a
                        href="">山西</a><a href="">河南</a><a href="">辽宁</a><a href="">吉林</a><a href="">黑龙江</a><a
                        href="">浙江</a><a href="">江苏</a><a href="">山东</a><a href="">安徽</a><a href="">内蒙古</a><a
                        href="">湖北</a><a href="">湖南</a><a href="">广东</a><a href="">广西</a><a href="">江西</a><a
                        href="">四川</a><a href="">海南</a><a href="">贵州</a><a href="">云南</a><a href="">西藏</a><a
                        href="">陕西</a><a href="">甘肃</a><a href="">青海</a><a href="">宁夏</a><a href="">新疆</a><a
                        href="">台湾</a><a href="">香港</a><a href="">澳门</a><a href="">海外</a><a href="qieh_cs.html">全部+</a>
                </div>
            </li>
        </ul>
        <ul class="header-right">
            @auth()
                <li class="denglu dengl_hou">
                    <div>
                        <a class="red" href="dengl.html">{{auth()->user()->email}}</a>
                        <i class="icon_plus_nickname"></i>
                        <i class="ci-leftll">
                            <s class="jt">◇</s>
                        </i>
                    </div>
                    <div class="dengl_hou_xial_k">
                        <div class="zuid_xiao_toux">
                            <a href="#"><img src="{{asset('org/home')}}/images/toux.png"></a>
                        </div>
                        <div class="huiy_dengj">
                            <a class="tuic_" href="{{route('user.logout')}}">退出</a>
                        </div>
                        <div class="toub_zil_daoh">
                            <a href="#">待处理订单</a>
                            <a href="#">我的收藏</a>
                            <a href="#">个人资料</a>
                            <a href="{{route('home.address.index')}}">邮寄地址</a>
                        </div>
                    </div>
                </li>
                @else
            <li class="denglu">Hi~<a class="red" href="{{route('user.login')}}">请登录!</a> <a href="{{route('user.register')}}">[免费注册]</a></li>
            @endauth
                <li class="shu"></li>
            <li class="denglu"><a class="ing_ps" href="#">我的收藏</a></li>
            <li class="shu"></li>
            <li class="denglu"><a class="ing_ps ps1" href="#">申请入驻</a></li>
            <li class="shu"></li>
            <li class="denglu"><a class="ing_ps ps2" href="#">客户服务</a></li>
            <li class="shu"></li>
            <li class="shouji bj">
                <a class="ing_ps ps3" href="#">手机通城</a>
                <i class="ci-right ">
                    <s class="jt">◇</s>
                </i>
                <div class="shouji1">

                    <img src="{{asset('org/home/images')}}/mb_wangid.png" class="shouji4">
                    <div class="shouji2">
                        <p>通城客户端</p>
                        <p class="red">首次下单满79元，送79元</p>
                    </div>
                    <div class="yi">
                        <img src="{{asset('org/home/images')}}/mb_wangid.png" class="shouji4">
                        <div class="er">
                            <p>通城微信公众号</p>
                            <p class="red">关注通城公众号的积分，换大礼</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--搜索栏-->
<div class="toub_beij">
    <div class="logo"><a href="/"><img src="{{shop_config('website.site_logo')}}" width="300px" height="86px"></a></div>
    <div class="search">
        <input type="text" value="家电一折抢" class="text" id="textt">
        <button class="button">搜索</button>
    </div>
    <div class="right">
        <i class="gw-left"></i>
        <i class="gw-right"></i>
        <div class="sc">
            <i class="gw-count">0</i>
            <i class="sd"></i>
        </div>
        <a href="gouw_che.html">我的购物车</a>
        <div class="dorpdown-layer">
            <ul>
                <li class="meiyou">
                    <img src="{{asset('org/home/images')}}/settleup-nogoods.png">
                    <span>购物车中还没有商品，赶紧选购吧！</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="hotwords">
        <a class="biaoti">热门搜索：</a>
        <a href="#">新款连衣裙</a>
        <a href="#">四件套</a>
        <a href="#">潮流T恤</a>
        <a href="#">时尚女鞋</a>
        <a href="#">乐1</a>
        <a href="#">特步女鞋</a>
        <a href="#">威士忌</a>
    </div>
</div>


<!--轮播图上方导航栏  一栏-->




@yield('content')



<!--底部-->
@include('home.index.footer')


</body>
</html>
