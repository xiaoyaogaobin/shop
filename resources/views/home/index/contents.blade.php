@extends('home.layouts.master')
@section('title')
    <title>欢迎您来到{{shop_config('website.site_name')}}商城_{{$content['title']}}</title>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{asset('org/slide/')}}/css/base.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="{{asset('org/slide/')}}/js/jquery.jqzoom.js"></script>
    <script type="text/javascript" src="{{asset('org/slide/')}}/js/base.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>
@endsection
@push('css')

    <link rel="stylesheet" type="text/css" href="{{asset('org/home')}}/css/ziy.css">
    <style>
        .bgclass{
            background-color: #cccccc!important;
            border: solid 1px #ffffff!important;
            color: #ffffff!important;
        }
        .clicks{
            border: 1px solid #e3101e!important;
            padding: 11px 10px!important;
        }

    </style>
    @endpush
@push('jscon')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('org/home')}}/js/jquery-1.11.3.min.js" ></script>
    <!--  <script src="js/index.js" ></script>  -->
    <!-- <script type="text/javascript" src="js/jquery1.42.min.js"></script> -->

    <script type="text/javascript" src="{{asset('org/home')}}/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{asset('org/home')}}/js/jquery.SuperSlide.2.1.1.source.js"></script>
    <script type="text/javascript" src="{{asset('org/home')}}/houl/jquery.fancybox-1.3.4.js"></script>
    @endpush
@section('content')
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
                <i class="tab-ico xx"><span>2</span></i>
                <em class="tab-text">购物车</em>
            </div>
            <div data-type="bar" clstag="h|keycount|cebianlan_h_follow|btn" class="J-trigger jdm-toolbar-tab jdm-tbar-tab-follow" data-name="follow" data-login="true">
                <i class="tab-ico"></i>
                <em class="tab-text">我的关注</em>
            </div>
            <div class="J-trigger jdm-toolbar-tab jdm-tbar-tab-message" data-name="message"><a target="_blank" href="#">
                    <i class="tab-ico"></i>
                    <em class="tab-text">我的消息
                    </em></a>
            </div>
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





<!--轮播图上方导航栏  一栏-->
<!--轮播图上方导航栏  一栏-->
<div id="navv" class="navv_ziy">
    <div class="focus">
        <div class="focus-a">
            <div class="fouc-font fouc_font_ziy">
                <a href="#">全部商品</a>
            </div>
        </div>
        <div class="focus-b">
            <ul>
                <li><a href="/">商城首页</a></li>
                @foreach($_categories as $v)

                    <li><a href="{{route ('home.list',['list'=>$v['id']])}}">{{$v->name}}</a></li>


                @endforeach


            </ul>
        </div>


        <!--左边导航结束-->
    </div>
</div>

<!--商品详情-->
<div class="breadcrumbs_container">
    <div class="left_luj">
        <ul>
            <li class="active">
            <a href="/">首页</a>
            </li>
            @foreach($getFather as $v)

                <li class="active">
                <a href="{{route('home.list',['list'=>$v['id']])}}">{{$v['name']}}</a>
                    <i class="icon-crumbs-right"></i>
                </li>
            @endforeach
            <li class="active">
                <a href="#" title="{{$content['title']}}">{{$content['title']}}</a>
            </li>
        </ul>
    </div>
    <div class="right_dianp">
        <div class="ly-stores shops-name">
            <a class="btn-collect ">
                <i class="icon-collect"></i>
                <span>收藏店铺</span>
                <i class="icon-arrow"></i>
            </a>
            <a class="btn-service hide customerService_show"<i></i>在线客服</a>
            <span class="services-score"><b class="star-gray"><i class="star-red" style="width:88.9059333333%"></i></b><em class="score">4.4</em>分</span>
            <a class="name" title="Mistletoe女装旗舰店" href="#" target="_blank">Mistletoe女装旗舰店</a>

        </div>
    </div>
</div>
<div class="gome_container">
    <!--左-->
    <div class="prd_firstscreen_left">

        @include('home.index.layouts.sild')
        <!---->
        <div class="preview-info">
            <div class="left-btns">
                <a class="share J-share" href="#">
                    <i class="sprite-share"></i><em>分享</em>
                </a>
                <a class="" href="#">
                    <i class="sprite-compare"></i><em>收藏商品（商品人气1500）</em>
                </a>
            </div>
            <div class="right-btns">
                <a class="report-btn" href="#">举报</a>
            </div>
        </div>
    </div>
    <!--中-->
    <div class="prd_firstscreen_center">
        <div class="hgroup">
            <h1>{{$content['title']}}</h1>
        </div>
        <div class="prd_price_1">
            <div class="unitprice">
                <p>
                    <label class="prd_price_left">原&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价</label>
                    <span class="price xiangq_yuanj"><em>¥</em>{{$content['price']}}</span>
                </p>
                <p>
                    <label class="prd_price_left">促&nbsp;销&nbsp;价</label>
                    <span class="price"><em>¥</em>{{$content['price']}}</span>
                </p>
            </div>
            <div class="prd_price_flr">
                <div class="prd_price_line">|</div>
                <div class="prd_price_lineright">
                    <p>好评度<em id="haocnt">98%</em></p>
                    <p class="pincnt"><a href="#" class="reduce"><em>55</em>人评价</a></p>
                </div>
            </div>
        </div>
        <!---->
        <div class="prd_properties">
            <div class="prd_properties_1">
                <label class="prd_price_left">服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务</label>
                <span>由<a href="#">Mistletoe女装旗舰店</a>发货并负责售后服务。</span>
            </div>
            <div class="prd-properties-2">

                <div class="prd_properties_other" style="display:block">
                    <label class="prdLeft">规&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格</label>
                    <div class="prdRight_1">
                        @foreach($contents as $pecs)
                        <div class="prdmod">
                            <a href="javascript:;"onclick="chooseSpec({{$pecs['id']}},this)"
                               title="{{$pecs['spec']}} id="spec{{$pecs['id']}}" data-alt="{{$pecs['spec']}}">{{$pecs['spec']}}<i></i></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="prd_properties_1 hou_jia">
            <label class="prd_price_left">货&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;源</label>
            <span >库存仅剩<font style="color: red;font-weight: 400;font-family: Arial; " id="total">{{$content['total']}}</font>件</span>
        </div>
        <style type="text/css">
            .hou_jia{
                padding:0 10px;
            }
            .kuc_jian{
                width: 100%;
                line-height: 25px;
            }
        </style>
        <!---->
        <div class="prd_buttons">
            <div class="count-wrapper" id="btnCount">
                <input type="text" class="quantity" value="1">
                <a href="javascript:;" class="plus j-gACbtnA" id="puch">+</a>
                <a href="javascript:;" class="minus j-gACbtn disab">-</a>
            </div>
            <a href="javacript:;"  class="btn-product btn-addcart ">立即购买</a>
            <a href="javascript:;" onclick="addCart(this)" class="btn-product bgclass">加入购物车</a>
            <script>
                function addCart(obj) {

                   if($(obj).hasClass('bgclass')){
                       layer.msg('请选择规格');
                   }else{
                       // ajax 提交
                       $.ajax({
                        // 提交网址
                           url:"{{route('home.cart.store')}}",
                           //提交方式
                           type:'post',
                           //提交数据
                           data:{},
                           //规定php 返回类型
                           dataType:'json',
                           //成功提示
                           success:function (res) {
                               if (res.code == 0){
                                  location.href="{{route('user.login')}}?from={{url()->full()}}"
                               }

                           },
                           //失败提示
                           error:function () {

                           }


                       })
                   }


                }

            </script>
        </div>
        <!---->
        <div class="prd-tips wenxintishi_wrap clearfix">
            <p>温馨提示</p>
            <ol class="wenxinti">
                <li>
                    正品保障；
                    支持7天无理由退货
                </li>
            </ol>
        </div>
        <!---->
    </div>
    <!--右-->
    <div class="prd_firstscreen_right">
        <h2>看了又看</h2>
        <!---->
        <div class="multipleColumn" style="margin:0 auto">
            <div class="bd">
                <div class="ulWrap">
                    <ul><!-- 把每次滚动的n个li放到1个ul里面 -->
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/xiangqtu_1.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi3.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/big_3.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                    </ul>
                    <ul><!-- 把每次滚动的n个li放到1个ul里面 -->
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/xiangqtu_1.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi3.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/big_3.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                    </ul>
                    <ul><!-- 把每次滚动的n个li放到1个ul里面 -->
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/xiangqtu_1.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi3.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                        <li>
                            <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/big_3.jpg" /></a></div>
                            <div class="title"><a href="#" target="_blank">￥68.00</a></div>
                        </li>
                    </ul>
                </div><!-- ulWrap End -->
            </div><!-- bd End -->
            <div class="hd">
                <ul></ul>
            </div>
        </div><!-- multipleColumn End -->

        <script type="text/javascript">
            jQuery(".multipleColumn").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",autoPlay:true,vis:1});
        </script>
        <!---->
    </div>
</div>

<!--商品信息结束-->
<!--详情-->
<div class="shangp_xiangq_neir_beij">
    <!--left-->
    <div class="shangp_xiangq_left">
        <!---->
        <div class="shangp_xiangq_left_biank">
            <div class="stores-infos">
                <div class="ly-stores">
                    <h2 class="fix-storesname shops-name" id="store_live800_wrap">
                        <a class="name" title="茂烨旗舰店" href="#" target="_blank">茂烨旗舰店</a>
                    </h2>
                    <div class="services-wrapper">
                        <div class="services-stars">
                            服务评分：
                            <span class="star"><i style="width:81.2819333333%">星星</i></span>
                            <span class="score">4.0</span>分
                        </div>
                        <div class="services-score-detail">
                            <p><span class="detail">评分明细</span><span class="contrast">与行业对比</span></p>
                            <div class="describe ">
                                <p>商品描述：<span>4.15</span><small title="计算规则：（商家得分-同行业平均分）" class="diyu_text">9.93%</small><i class="diyu">箭头</i></p>
                            </div>
                            <div class="logistics">
                                <p>发货速度：<span>3.96</span><small title="计算规则：（商家得分-同行业平均分" class="diyu_text">15.34%</small><i class="diyu">箭头</i></p>
                            </div>
                            <div class="services">
                                <p>服务质量：<span>4.08</span><small title="计算规则：（商家得分-同行业平均分））" class="diyu_text">13.08%</small><i class="diyu">箭头</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn-product btn-enter" target="_blank"><i></i>进入店铺</a>
                        <a href="#" class="btn-collect"><i class="sprite-enter"></i>收藏店铺</a>
                    </div>
                </div>
            </div>
            <!---->
            <div class="dianp_xiao_jiej">
                <div class="shangj_diz">
                    <p>地址：<span>贵州省贵阳市云岩区大亨大厦16层</span></p>
                    <p>联系人：<span>潘中全</span></p>
                    <p>电话：<span>0852-8667011</span></p>
                    <p>营业时间：<span>09:00至18:00</span></p>
                </div>
                <div class="_xq_gogns_jianj">
                    <p>公司简介：</p>
                    <p class="_xq_gogns_jianj_neir">魅CO视觉，主张时尚个性的摄影理念，以独特和新锐的时尚触觉为客户提供性化的摄影服务。追逐时尚，同时更注重情感表达。用最丰<a href="#">[查看更多]</a></p>
                </div>
            </div>
        </div>
        <!---->
        <div class="shangp_xiangq_left_biank">
            <div class="stores-infos">
                <div class="ly-stores">
                    <h2 class="fix-storesname shops-name" id="store_live800_wrap">
                        <a class="name" title="本店商品" href="#" target="_blank">本店商品</a>
                    </h2>
                    <ul class="bend_shangp_lieb">
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi3.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi3.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi2.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi1.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi2.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi2.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!---->
        <div class="shangp_xiangq_left_biank">
            <div class="stores-infos">
                <div class="ly-stores">
                    <h2 class="fix-storesname shops-name" id="store_live800_wrap">
                        <a class="name" title="热门商品" href="#" target="_blank">热门商品</a>
                    </h2>
                    <ul class="bend_shangp_lieb">
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi3.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi3.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi2.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi1.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi2.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('org/home')}}/images/lieb_tupi2.jpg">
                                <h3>￥58.00</h3>
                                <p>茵珠麗YinZhuli 春秋季新款韩版居家服女针织棉长袖情</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!---->
    </div>
    <!--right-->
    <div class="shangp_xiangq_right">
        <!---->
        <div class="slideTxtBox_1">
            <div class="hd">
                <ul><li>商品介绍</li><li>售后保障</li><li>商品评价(500+)</li></ul>

            </div>
            <div class="bd">
                <ul>

                    <div class="detail_content_wrap">
                        {!!  $content['content']!!}
                    </div>
                    <div class="shouh_baoz">
                        <div class="mt">
                            <h3>售后保障</h3>
                        </div>
                        <!---->
                        <div class="mc">
                            <div class="item-detail item-detail-copyright">
                                <div class="serve-agree-bd">
                                    <dl>
                                        <dt>
                                            <i class="goods"></i>
                                            <strong>卖家服务</strong>
                                        </dt>
                                        <dd>
                                        </dd>
                                        <dt>
                                            <i class="goods"></i>
                                            <strong>正品行货</strong>
                                        </dt>
                                        <dd>
                                            wangid平台卖家销售并发货的商品，由卖家提供发票和相应的售后服务。请您放心购买！<br>
                                            注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
                                        </dd>

                                    </dl>
                                </div>
                                <div id="state">
                                    <strong>权利声明：</strong><br>wangid通城上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。
                                    <p><b>注：</b>本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。</p>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                    <!---->
                    <div class="shouh_baoz_2">
                        <div class="mt"><h3>商品评价</h3></div>
                        <div class="mc">
                            <div class="comment-info J-comment-info">
                                <div class="comment-percent">
                                    <strong class="percent-tit">好评度</strong>
                                    <div class="percent-con">99<span>%</span></div>
                                </div>
                            </div>
                            <!---->
                            <div class="ETab">
                                <div class="tab-main small">
                                    <ol class="filter-list">
                                        <li class="current_xq" data-num="4900"><a href="#">全部评价<em>(4900+)</em></a></li>
                                        <li ><a href="#">晒图<em>(60)</em></a></li>
                                        <li class="J-addComment"><a href="#">追评<em>(8)</em></a></li>
                                        <li><a href="#">好评<em>(4900+)</em></a></li><li>
                                            <a href="#">中评<em>(40+)</em></a></li>
                                        <li><a href="#">差评<em>(20+)</em></a></li>
                                        <li class="comm-curr-sku"><span><input type="checkbox"></span><label>只看当前商品评价</label></li>
                                    </ol>
                                    <div class="_extra_a">
                                        <div class="sort-select">
                                            <div class="current_tc"><span class="J-current-sortType">推荐排序</span><i></i></div>
                                            <div class="others">
                                                <div class="curr"><span class="J-current-sortType">推荐排序</span><i></i></div>
                                                <ol>
                                                    <li class="J-sortType-item">推荐排序</li>
                                                    <li class="J-sortType-item">时间排序</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="tab_con">
                            <ol class="replyListWrap">
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:100%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                        <div id="content">
                                            <p>
                                                <a rel="example_group" href="{{asset('org/home')}}/images/example/9_b.jpg" title="Lorem ipsum dolor sit amet"><img alt="" src="{{asset('org/home')}}/images/example/9_s.jpg" /></a>
                                                <a rel="example_group" href="{{asset('org/home')}}/images/example/10_b.jpg" title=""><img alt="" src="{{asset('org/home')}}/images/example/10_s.jpg" /></a>
                                                <a rel="example_group" href="{{asset('org/home')}}/images/example/11_b.jpg" title=""><img alt="" src="{{asset('org/home')}}/images/example/11_s.jpg" /></a>
                                                <a rel="example_group" href="{{asset('org/home')}}/images/example/12_b.jpg" title=""><img class="last" alt="" src="{{asset('org/home')}}/images/example/12_s.jpg" /></a>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="{{asset('org/home')}}/images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:20%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                        <div id="content">
                                            <p>
                                                <a rel="example_group" href="images/example/9_b.jpg" title="Lorem ipsum dolor sit amet"><img alt="" src="images/example/9_s.jpg" /></a>
                                                <a rel="example_group" href="images/example/10_b.jpg" title=""><img alt="" src="{{asset('org/home')}}/images/example/10_s.jpg" /></a>
                                                <a rel="example_group" href="images/example/11_b.jpg" title=""><img alt="" src="{{asset('org/home')}}/images/example/11_s.jpg" /></a>
                                                <a rel="example_group" href="images/example/12_b.jpg" title=""><img class="last" alt="" src="{{asset('org/home')}}/images/example/12_s.jpg" /></a>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>

                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:80%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                            </ol>
                            <div class="com-table-footer">
                                <div class="ui-page-wrap">
                                    <div class="ui-page">
                                        <a rel="1" class="ui-page-curr" href="#">1</a>
                                        <a rel="2" href="#">2</a>
                                        <a rel="3" href="#">3</a>
                                        <a rel="4" href="#">4</a>
                                        <a rel="5" href="#">5</a>
                                        <a rel="6" href="#">6</a>
                                        <span>...</span>
                                        <a rel="2" class="ui-pager-next" href="#">下一页</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="jkdhfld">
                            <div class="mt"><h3>商品评价</h3></div>
                            <div class="consult-rt">
                                <table class="consult-form" >
                                    <caption>我要发表咨询</caption>
                                    <tbody><tr id="tr-zxlx">
                                        <th>咨询类型:&nbsp;</th>
                                        <td>
                                            <label class="cst-type" ><input type="radio" value="1" >购买咨询</label>
                                            <label class="cst-type" ><input type="radio" value="2" >促销优惠</label>
                                            <label class="cst-type" ><input type="radio" value="3" >支付问题</label>
                                            <label class="cst-type" ><input type="radio" value="4" >售后咨询</label>
                                        </td>
                                    </tr>
                                    <tr class="consul_type_wrap">
                                        <th>回复方式:&nbsp;</th>
                                        <td>
                                            <div>
                                                <label class="cst-type" for="consul_site">
                                                    <input type="radio" value="consul_site" name="hffs-type" id="consul_site" checked="checked">网站
                                                </label>
                                                <label class="cst-type" for="consul_mail">
                                                    <input type="radio" value="consul_mail" name="hffs-type" id="consul_mail">邮箱
                                                </label>
                                                <label class="cst-type" for="consul_weixin">
                                                    <input type="radio" value="consul_weixin" name="hffs-type" id="consul_weixin">微信
                                                </label>
                                            </div>
                                            <div class="weixin-sm" style="display: none;">
                                                <div class="img-w">
                                                    <img gome-src="//js.gomein.net.cn/f2eimage/ui/customer_service_weixin.jpg" alt="手机下单更优惠" title="手机下单更优惠">
                                                </div>
                                                <div class="text">
                                                    <p>扫描二维码，关注客服中心公众号，我们将为您提供更加快速便捷的咨询服务</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="consul_type_wrap" id="email-address" style="display: none;">
                                        <th>邮箱地址:&nbsp;</th>
                                        <td>
                                            <input type="text" value="请填写您的邮箱，以便客服回复！" maxlength="50" id="consul_type_text" name="consul_type_text">
                                            <span class="email-error"></span>
                                        </td>
                                    </tr>
                                    <tr id="gm-zxnr">
                                        <th>咨询内容:&nbsp;</th>
                                        <td>
                                            <div class="txt-area-wrap">
                                                <textarea name="" id="quesTxt" class="txt-area"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="gm-submit">
                                        <th></th>
                                        <td><a class="consult-smt-btn redlink">提交</a><span class="tips">0/200</span></td>
                                    </tr>
                                    </tbody></table>
                                <div class="consult-lt">
                                    <dl class="consult-question clearfix">
                                        <dt>常见问题</dt>
                                        <dd>•<a href="#" target="_blank" title="忘记密码如何操作？">忘记密码如何操作？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何增强账户安全系数？">如何增强账户安全系数？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="怎么操作商品签收？">怎么操作商品签收？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何电话订购？">如何电话订购？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何查询商品参数及包装清单？">如何查询商品参数及包装清单？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="商品无货怎么办？">商品无货怎么办？</a></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                    <!---->
                </ul>
                <!--售后保障-->
                <ul>
                    <div class="shouh_baoz">
                        <div class="mt">
                            <h3>售后保障</h3>
                        </div>
                        <!---->
                        <div class="mc">
                            <div class="item-detail item-detail-copyright">
                                <div class="serve-agree-bd">
                                    <dl>
                                        <dt>
                                            <i class="goods"></i>
                                            <strong>卖家服务</strong>
                                        </dt>
                                        <dd>
                                        </dd>
                                        <dt>
                                            <i class="goods"></i>
                                            <strong>正品行货</strong>
                                        </dt>
                                        <dd>
                                            wangid平台卖家销售并发货的商品，由卖家提供发票和相应的售后服务。请您放心购买！<br>
                                            注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
                                        </dd>

                                    </dl>
                                </div>
                                <div id="state">
                                    <strong>权利声明：</strong><br>wangid通城上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。
                                    <p><b>注：</b>本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。</p>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                    <div class="shouh_baoz_2">
                        <div class="mt"><h3>商品评价</h3></div>
                        <div class="mc">
                            <div class="comment-info J-comment-info">
                                <div class="comment-percent">
                                    <strong class="percent-tit">好评度</strong>
                                    <div class="percent-con">99<span>%</span></div>
                                </div>
                            </div>
                            <!---->
                            <div class="ETab">
                                <div class="tab-main small">
                                    <ol class="filter-list">
                                        <li class="current_xq" data-num="4900"><a href="#">全部评价<em>(4900+)</em></a></li>
                                        <li><a href="#">晒图<em>(60)</em></a></li>
                                        <li class="J-addComment"><a href="#">追评<em>(8)</em></a></li>
                                        <li><a href="#">好评<em>(4900+)</em></a></li><li>
                                            <a href="#">中评<em>(40+)</em></a></li>
                                        <li><a href="#">差评<em>(20+)</em></a></li>
                                        <li class="comm-curr-sku"><span><input type="checkbox"></span><label>只看当前商品评价</label></li>
                                    </ol>
                                    <div class="_extra_a">
                                        <div class="sort-select">
                                            <div class="current_tc"><span class="J-current-sortType">推荐排序</span><i></i></div>
                                            <div class="others">
                                                <div class="curr"><span class="J-current-sortType">推荐排序</span><i></i></div>
                                                <ol>
                                                    <li class="J-sortType-item">推荐排序</li>
                                                    <li class="J-sortType-item">时间排序</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="tab_con">
                            <ol class="replyListWrap">
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:100%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:20%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:80%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                            </ol>
                            <div class="com-table-footer">
                                <div class="ui-page-wrap">
                                    <div class="ui-page">
                                        <a rel="1" class="ui-page-curr" href="#">1</a>
                                        <a rel="2" href="#">2</a>
                                        <a rel="3" href="#">3</a>
                                        <a rel="4" href="#">4</a>
                                        <a rel="5" href="#">5</a>
                                        <a rel="6" href="#">6</a>
                                        <span>...</span>
                                        <a rel="2" class="ui-pager-next" href="#">下一页</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="jkdhfld">
                            <div class="mt"><h3>商品评价</h3></div>
                            <div class="consult-rt">
                                <table class="consult-form">
                                    <caption>我要发表咨询</caption>
                                    <tbody><tr id="tr-zxlx">
                                        <th>咨询类型:&nbsp;</th>
                                        <td>
                                            <label class="cst-type"><input type="radio" value="1">购买咨询</label>
                                            <label class="cst-type"><input type="radio" value="2">促销优惠</label>
                                            <label class="cst-type"><input type="radio" value="3">支付问题</label>
                                            <label class="cst-type"><input type="radio" value="4">售后咨询</label>
                                        </td>
                                    </tr>
                                    <tr class="consul_type_wrap">
                                        <th>回复方式:&nbsp;</th>
                                        <td>
                                            <div>
                                                <label class="cst-type" for="consul_site">
                                                    <input type="radio" value="consul_site" name="hffs-type" id="consul_site" checked="checked">网站
                                                </label>
                                                <label class="cst-type" for="consul_mail">
                                                    <input type="radio" value="consul_mail" name="hffs-type" id="consul_mail">邮箱
                                                </label>
                                                <label class="cst-type" for="consul_weixin">
                                                    <input type="radio" value="consul_weixin" name="hffs-type" id="consul_weixin">微信
                                                </label>
                                            </div>
                                            <div class="weixin-sm" style="display: none;">
                                                <div class="img-w">
                                                    <img gome-src="//js.gomein.net.cn/f2eimage/ui/customer_service_weixin.jpg" alt="手机下单更优惠" title="手机下单更优惠">
                                                </div>
                                                <div class="text">
                                                    <p>扫描二维码，关注客服中心公众号，我们将为您提供更加快速便捷的咨询服务</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="consul_type_wrap" id="email-address" style="display: none;">
                                        <th>邮箱地址:&nbsp;</th>
                                        <td>
                                            <input type="text" value="请填写您的邮箱，以便客服回复！" maxlength="50" id="consul_type_text" name="consul_type_text">
                                            <span class="email-error"></span>
                                        </td>
                                    </tr>
                                    <tr id="gm-zxnr">
                                        <th>咨询内容:&nbsp;</th>
                                        <td>
                                            <div class="txt-area-wrap">
                                                <textarea name="" id="quesTxt" class="txt-area"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="gm-submit">
                                        <th></th>
                                        <td><a class="consult-smt-btn redlink">提交</a><span class="tips">0/200</span></td>
                                    </tr>
                                    </tbody></table>
                                <div class="consult-lt">
                                    <dl class="consult-question clearfix">
                                        <dt>常见问题</dt>
                                        <dd>•<a href="#" target="_blank" title="忘记密码如何操作？">忘记密码如何操作？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何增强账户安全系数？">如何增强账户安全系数？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="怎么操作商品签收？">怎么操作商品签收？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何电话订购？">如何电话订购？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何查询商品参数及包装清单？">如何查询商品参数及包装清单？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="商品无货怎么办？">商品无货怎么办？</a></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </ul>
                <!--商品评价-->
                <ul>
                    <div class="shouh_baoz_2">
                        <div class="mt"><h3>商品评价</h3></div>
                        <div class="mc">
                            <div class="comment-info J-comment-info">
                                <div class="comment-percent">
                                    <strong class="percent-tit">好评度</strong>
                                    <div class="percent-con">99<span>%</span></div>
                                </div>
                            </div>
                            <!---->
                            <div class="ETab">
                                <div class="tab-main small">
                                    <ol class="filter-list">
                                        <li class="current_xq" data-num="4900"><a href="#">全部评价<em>(4900+)</em></a></li>
                                        <li><a href="#">晒图<em>(60)</em></a></li>
                                        <li class="J-addComment"><a href="#">追评<em>(8)</em></a></li>
                                        <li><a href="#">好评<em>(4900+)</em></a></li><li>
                                            <a href="#">中评<em>(40+)</em></a></li>
                                        <li><a href="#">差评<em>(20+)</em></a></li>
                                        <li class="comm-curr-sku"><span><input type="checkbox"></span><label>只看当前商品评价</label></li>
                                    </ol>
                                    <div class="_extra_a">
                                        <div class="sort-select">
                                            <div class="current_tc"><span class="J-current-sortType">推荐排序</span><i></i></div>
                                            <div class="others">
                                                <div class="curr"><span class="J-current-sortType">推荐排序</span><i></i></div>
                                                <ol>
                                                    <li class="J-sortType-item">推荐排序</li>
                                                    <li class="J-sortType-item">时间排序</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="tab_con">
                            <ol class="replyListWrap">
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:100%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:20%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>


                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                                <li class="oh_de">
                                    <div class="reply-left">
										<span class="detail-star bgiprd">
											<b style="width:80%" class="bgiprd"></b>
										</span>
                                        <p>收货后1天评论</p>
                                        <p><a target="_blank" href="//review.gome.com.cn/P136937461.html">2017-09-22 12:44</a></p>
                                        <p><span>白色 M码</span></p>
                                    </div>
                                    <div class="reply-center">
                                        <p>正品行货，很棒</p>
                                    </div>
                                    <div class="reply-right">
                                        <div class="reply_avatar">
                                            <img src="{{asset('org/home')}}/images/7_170312181624_2.jpg">
                                            <span class="reply_avatar_userName">祢夏了夏天</span>
                                        </div>
                                        <p class="profileGrade"><span class="viplevel">V2会员</span><span class="area">石家庄市</span></p>
                                    </div>
                                </li>
                            </ol>
                            <div class="com-table-footer">
                                <div class="ui-page-wrap">
                                    <div class="ui-page">
                                        <a rel="1" class="ui-page-curr" href="#">1</a>
                                        <a rel="2" href="#">2</a>
                                        <a rel="3" href="#">3</a>
                                        <a rel="4" href="#">4</a>
                                        <a rel="5" href="#">5</a>
                                        <a rel="6" href="#">6</a>
                                        <span>...</span>
                                        <a rel="2" class="ui-pager-next" href="#">下一页</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="jkdhfld">
                            <div class="mt"><h3>商品评价</h3></div>
                            <div class="consult-rt">
                                <table class="consult-form">
                                    <caption>我要发表咨询</caption>
                                    <tbody><tr id="tr-zxlx">
                                        <th>咨询类型:&nbsp;</th>
                                        <td>
                                            <label class="cst-type"><input type="radio" value="1">购买咨询</label>
                                            <label class="cst-type"><input type="radio" value="2">促销优惠</label>
                                            <label class="cst-type"><input type="radio" value="3">支付问题</label>
                                            <label class="cst-type"><input type="radio" value="4">售后咨询</label>
                                        </td>
                                    </tr>
                                    <tr class="consul_type_wrap">
                                        <th>回复方式:&nbsp;</th>
                                        <td>
                                            <div>
                                                <label class="cst-type" for="consul_site">
                                                    <input type="radio" value="consul_site" name="hffs-type" id="consul_site" checked="checked">网站
                                                </label>
                                                <label class="cst-type" for="consul_mail">
                                                    <input type="radio" value="consul_mail" name="hffs-type" id="consul_mail">邮箱
                                                </label>
                                                <label class="cst-type" for="consul_weixin">
                                                    <input type="radio" value="consul_weixin" name="hffs-type" id="consul_weixin">微信
                                                </label>
                                            </div>
                                            <div class="weixin-sm" style="display: none;">
                                                <div class="img-w">
                                                    <img gome-src="//js.gomein.net.cn/f2eimage/ui/customer_service_weixin.jpg" alt="手机下单更优惠" title="手机下单更优惠">
                                                </div>
                                                <div class="text">
                                                    <p>扫描二维码，关注客服中心公众号，我们将为您提供更加快速便捷的咨询服务</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="consul_type_wrap" id="email-address" style="display: none;">
                                        <th>邮箱地址:&nbsp;</th>
                                        <td>
                                            <input type="text" value="请填写您的邮箱，以便客服回复！" maxlength="50" id="consul_type_text" name="consul_type_text">
                                            <span class="email-error"></span>
                                        </td>
                                    </tr>
                                    <tr id="gm-zxnr">
                                        <th>咨询内容:&nbsp;</th>
                                        <td>
                                            <div class="txt-area-wrap">
                                                <textarea name="" id="quesTxt" class="txt-area"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="gm-submit">
                                        <th></th>
                                        <td><a class="consult-smt-btn redlink">提交</a><span class="tips">0/200</span></td>
                                    </tr>
                                    </tbody></table>
                                <div class="consult-lt">
                                    <dl class="consult-question clearfix">
                                        <dt>常见问题</dt>
                                        <dd>•<a href="#" target="_blank" title="忘记密码如何操作？">忘记密码如何操作？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何增强账户安全系数？">如何增强账户安全系数？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="怎么操作商品签收？">怎么操作商品签收？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何电话订购？">如何电话订购？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="如何查询商品参数及包装清单？">如何查询商品参数及包装清单？</a></dd>
                                        <dd>•<a href="#" target="_blank" title="商品无货怎么办？">商品无货怎么办？</a></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                </ul>
            </div>
        </div>
        <script type="text/javascript">jQuery(".slideTxtBox_1").slide({trigger:"click"});</script>
        <!---->
    </div>
</div>




<!--商品详情结束-->
@push('jsyb')
<script src="https://cdn.bootcss.com/layer/2.3/layer.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

    function chooseSpec(id,obj){

        $(obj).addClass('select').parent('.prdmod').siblings('.prdmod').find('a').removeClass('select');
        layer.load();
        // 点击选中没效果
        // 点击发送异步请求
        $.post("{{route ('home.spec_to_get_total')}}",{id:id},function (res) {
            layer.closeAll('loading');
            // console.log(res)
            $('#total').html(res.total);
            $('.btn-product').removeClass('bgclass');
        },'json')
        //数字加一


    }
    $(function () {


        $('#puch').click(function () {

            let num = $('.quantity').val() ;
            $('.minus').removeClass('disab')
            if (num>=0){
                num++
                $('.quantity').val(num)
            }
            if (num>{{$content['total']}}){
                layer.msg('超过库存拉');
                $('.quantity').val({{$content['total']}});
            }

        })

        $('.minus').click(function () {
          let   num = $('.quantity').val() ;
            if (num>1){
                num--
                $('.quantity').val(num)
            }
            if (num<=1){
                layer.msg('库存没有了');
                $('.quantity').val(1);

            }

        })



    })

    $(document).ready(function() {
        /*
        *   Examples - images
        */

        $("a#example1").fancybox();

        $("a#example2").fancybox({
            'overlayShow'	: false,
            'transitionIn'	: 'elastic',
            'transitionOut'	: 'elastic'
        });

        $("a#example3").fancybox({
            'transitionIn'	: 'none',
            'transitionOut'	: 'none'
        });

        $("a#example4").fancybox({
            'opacity'		: true,
            'overlayShow'	: false,
            'transitionIn'	: 'elastic',
            'transitionOut'	: 'none'
        });

        $("a#example5").fancybox();

        $("a#example6").fancybox({
            'titlePosition'		: 'outside',
            'overlayColor'		: '#000',
            'overlayOpacity'	: 0.9
        });

        $("a#example7").fancybox({
            'titlePosition'	: 'inside'
        });

        $("a#example8").fancybox({
            'titlePosition'	: 'over'
        });

        $("a[rel=example_group]").fancybox({
            'transitionIn'		: 'none',
            'transitionOut'		: 'none',
            'titlePosition' 	: 'over',
            'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });

        /*
        *   Examples - various
        */

        $("#various1").fancybox({
            'titlePosition'		: 'inside',
            'transitionIn'		: 'none',
            'transitionOut'		: 'none'
        });

        $("#various2").fancybox();

        $("#various3").fancybox({
            'width'				: '75%',
            'height'			: '75%',
            'autoScale'			: false,
            'transitionIn'		: 'none',
            'transitionOut'		: 'none',
            'type'				: 'iframe'
        });

        $("#various4").fancybox({
            'padding'			: 0,
            'autoScale'			: false,
            'transitionIn'		: 'none',
            'transitionOut'		: 'none'
        });
    });
</script>
 @endpush
@endsection






