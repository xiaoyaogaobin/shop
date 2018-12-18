@extends('home.layouts.master')
@section('title')
    <title>欢迎您来到{{shop_config('website.site_name')}}商城</title>
    <script type="text/javascript" src="{{asset('org/home')}}/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="{{asset('org/home')}}/js/jquery.reveal.js"></script>

    <script type="text/javascript" src="{{asset('org/home')}}/js/chengs/jquery.js"></script>
    <script type="text/javascript" src="{{asset('org/home')}}/js/chengs/bootstrap.js"></script>
    <script type="text/javascript" src="{{asset('org/home')}}/js/chengs/city-picker.data.js"></script>
    <script type="text/javascript" src="{{asset('org/home')}}/js/chengs/city-picker.js"></script>
    <script type="text/javascript" src="{{asset('org/home')}}/js/chengs/main.js"></script>
@endsection
@section('content')

    <!---->
    <div class="wod_tongc_zhongx">
        <div class="beij_center">
            <div class="myGomeWeb">
                <!--侧边导航-->
                <div class="tod_tongc_zuoc">
                    <div class="zuoc_toux">
                        <div class="toux_kuang">
                            <div class="userImage">
                                <div class="myGome_userPhoto">
                                    <img src="{{asset('org/home')}}/images/toux.png">
                                    <a class="edit_photo_bitton" href="profile" target="_blank">编辑</a>
                                </div>
                            </div>
                            <div class="user_name_Level">
                                <p class="user_name" title="山的那边是海">{{auth()->user()->name}}</p>
                                <p class="userLevel">会员：<span class="levelId icon_plus_nickname"></span></p>
                            </div>
                        </div>
                        <div class="userInfo_bar">
                            <span>资料完成度</span>
                            <span class="userInfo_process_bar"><em class="active_bar"
                                                                   style="width: 40px;"> 20%</em></span>
                            <a href="#" target="_blank">完善</a>
                        </div>
                        <div class="myGome_accountSecurity">
                            <span class="fl_ee" style="margin-top:2px;">账户安全 <em
                                    class="myGome_account_level"> 低</em> </span>
                            <div class="verifiBox fl_ee">
                                <div class="shab_1">
                                    <span class="myGome_mobile" val="mobile"> <em
                                            class=" myGome_onActive "></em> </span>
                                    <p class="myGome_verifiPop"><span>您已绑定手机：</span> <span>182****0710</span> <a
                                            href="#" target="_blank">管理</a></p>
                                </div>
                                <div class="shab_1">
                                    <span class="myGome_email" val="email"> <em class=""></em> </span>
                                    <p class="myGome_verifiPop"><span>您还未绑定邮箱 </span><a href="#"
                                                                                        target="_blank">立即绑定</a></p>
                                </div>
                            </div>
                            <a class="fl_ee" href="#" target="_blank" style="margin-top:2px;">提升</a>
                        </div>
                        <div class="user_counts">
                            <ul>
                                <li>
                                    <div class="count_item">
                                        <a href="#">
                                            <i class="count_icon count_icon01"></i> 待付款
                                            <em id="waitPay">2</em>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="count_item">
                                        <a href="#">
                                            <i class="count_icon count_icon02"></i> 待收货
                                            <em id="waitPay">4</em>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="count_item">
                                        <a href="#">
                                            <i class="count_icon count_icon03"></i> 待提货
                                            <em id="waitPay">0</em>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="count_item">
                                        <a href="#">
                                            <i class="count_icon count_icon04"></i> 待评价
                                            <em id="waitPay">8</em>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wod_tongc_daoh_lieb">
                        <div class="diy_top">
                            <ul>
                                <h3>订单中心</h3>
                                <li><a href="wod_dingd.html">我的订单</a></li>
                                <li><a href="#">退换货单</a></li>
                                <li><a href="#">评价晒单</a></li>
                            </ul>
                            <ul>
                                <h3>管理中心</h3>
                                <li><a href="wod_shouc.html">我的收藏</a></li>
                                <li><a href="#">我的预约</a></li>
                                <li><a href="#">我的咨询</a></li>
                                <li><a href="#">投诉管理</a></li>
                            </ul>
                        </div>
                        <div class="diy_top">
                            <ul>
                                <h3>账户设置</h3>
                                <li><a href="#">基本资料</a></li>
                                <li><a href="#">账户安全</a></li>
                                <li><a href="#">收货地址</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--左边内容-->
                <div class="mod_main">
                    <div class="jib_xinx_kuang">
                        <div class="shand_piaot">收货地址</div>

                        <div class="shouh_diz_beij">
                            @foreach($address as $v)
                                <div class="shouh_diz_kuang shouh_diz_kuang_mor">
                                    <div class="item">
                                        <span class="labal">收件人：</span>
                                        <p>{{$v['name']}}</p>
                                    </div>
                                    <div class="item">
                                        <span class="labal">所在地区：</span>
                                        <p>{{$v['city']}}</p>
                                    </div>
                                    <div class="item">
                                        <span class="labal">地址：</span>
                                        <p>{{$v['address']}}</p>
                                    </div>
                                    <div class="item">
                                        <span class="labal">手机：</span>
                                        <p>{{$v['phone']}}</p>
                                    </div>

                                    <div class="bianj_yv_shanc">
                                        <a href="{{route('home.address.push',$v)}}" class="mor_color">
                                            @if($v->default == 1)
                                                <span style="display: block; width: 80px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ff5000;
                                                    border-radius: 3px;background: #ffd6cc;color: #f30;    margin-bottom: -13px;">默认地址</span>
                                            @else
                                                设为默认
                                            @endif

                                        </a>
                                        <a href="{{route('home.address.edit',$v)}}">编辑</a>
                                        <a href="javascript:;" onclick="del(this)">删除</a>
                                    </div>
                                    <form action="{{route('home.address.destroy',$v)}}" id="formDel" method="">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            @endforeach
                            <div class="xinz_shouh_dz_ann"><a href="#" data-reveal-id="myModal">新增收货地址</a></div>
                        </div>

                    </div>
                </div>
                <!--左边内容结束-->
            </div>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.slim.min.js"></script>
    <script>
        function del(obj) {
            $('#formDel').submit()
        }

    </script>
    <!--新增地址表单-->
    <div id="myModal" class="reveal-modal">


        <div class="xint_biaot">
            <h3>新添收货地址</h3>
        </div>
        <form action="{{route('home.address.store')}}" method="post">
            @csrf
            <div class="shouj_diz_b">
                <div class="biaod_1">
                    <p><em>*</em>联系人：</p>
                    <input type="text" class="text" name="name">
                </div>
                <div class="biaod_1">
                    <p><em>*</em>收货地址：</p>
                    <div class="xinz_diz_cs">
                        <div class="docs-methods">
                            <form class="form-inline">
                                <div id="distpicker">
                                    <div class="form-group">
                                        <div style="position: relative;">
                                            <input id="city-picker3" class="form-control" readonly type="text"
                                                   name="city" value="北京市/北京市/朝阳区" data-toggle="city-picker">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="biaod_1">
                    <p><em>*</em>详细地址：</p>
                    <input type="text" class="text text1" name="address">
                </div>
                <div class="biaod_1 biaod_2">
                    <div class="liangp_e">
                        <p><em>*</em>手机号码：</p>
                        <input type="text" class="text" name="phone">
                    </div>

                </div>

                <div class="biaod_1">
                    <button type="submit" class="diz_baoc">保存</button>
                </div>
            </div>
        </form>
        <a class="close-reveal-modal">&#215;</a>

    </div>
    {{--编辑表单--}}
    <div id="myModal_1" class="reveal-modal">


        <div class="xint_biaot">
            <h3>编辑收货地址</h3>
        </div>
        <form action="{{route('home.address.update',2)}}" method="post">
            @csrf @method('PUT')
            <div class="shouj_diz_b">
                <div class="biaod_1">
                    <p><em>*</em>联系人：</p>
                    <input type="text" class="text" name="name">
                </div>
                <div class="biaod_1">
                    <p><em>*</em>收货地址：</p>
                    <div class="xinz_diz_cs">
                        <div class="docs-methods">
                            <form class="form-inline">
                                <div id="distpicker">
                                    <div class="form-group">
                                        <div style="position: relative;">
                                            <input id="city-picker3" class="form-control" readonly type="text"
                                                   name="city" value="北京市/北京市/朝阳区" data-toggle="city-picker">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="biaod_1">
                    <p><em>*</em>详细地址：</p>
                    <input type="text" class="text text1" name="address">
                </div>
                <div class="biaod_1 biaod_2">
                    <div class="liangp_e">
                        <p><em>*</em>手机号码：</p>
                        <input type="text" class="text" name="phone">
                    </div>

                </div>

                <div class="biaod_1">
                    <button type="submit" class="diz_baoc">保存</button>
                </div>
            </div>
        </form>
        <a class="close-reveal-modal">&#215;</a>

    </div>
    @include('layouts.message')

@endsection







