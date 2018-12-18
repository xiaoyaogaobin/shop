@extends('home.layouts.master')
@section('title')
    <title>欢迎您来到{{shop_config('website.site_name')}}商城购物车</title>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/vue/2.5.21/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="{{asset('org/layui/css/layui.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="navv_ziy">
        <div class="focus">
            <div class="focus-a">
                <div class="fouc-font fouc_font_ziy">
                    <a href="#">全部商品分类</a>
                </div>
            </div>
            <div class="focus-b">
                <ul>
                    <li><a href="/">商城首页</a></li>
                    <?php
                    $i = 0 ?>

                    @foreach($_categories as $v)
                        <?php $i++ ?>
                        @if($i<6)
                            <li><a href="{{route ('home.list',['list'=>$v['id']])}}">{{$v->name}}</a></li>
                        @endif
                    @endforeach


                </ul>
            </div>

            <!--左边导航-->

            <div class="subpage" id="id_a">
                <h2 id="h2_d"></h2>
                <div class="prosul dd-inner dd_inner_ziy" id="proinfo">
                    @foreach($categoryData as $v)
                        <div class="fore-2">
                            <div class="item fore1">
                                <h3>
                                    <a class="da_zhu"
                                       href="{{route ('home.list',['list'=>$v['id']])}}">{{$v['name']}}</a>
                                    <?php
                                    $i = 0
                                    ?>
                                    <p>

                                        @foreach($v['_data'] as $vv)
                                            <?php $i++;?>
                                            @if($i<4)
                                                <a href="{{route ('home.list',['list'=>$vv['id']])}}">{{$vv['name']}}</a>
                                            @endif
                                        @endforeach

                                    </p>
                                </h3>
                                <i>></i>
                            </div>
                            <div class="font-item1">
                                <div class="font-lefty">
                                    <dl class="fore1">
                                        @foreach($v['_data'] as $vv)
                                            <dt><a href="{{route ('home.list',['list'=>$vv['id']])}}">{{$vv['name']}}<i>></i></a>
                                            </dt>


                                            <dd>
                                                @foreach($vv['_data'] as $vvv)
                                                    <a href="{{route ('home.list',['list'=>$vvv['id']])}}">{{$vvv['name']}}</a>
                                                @endforeach
                                            </dd>

                                        @endforeach
                                    </dl>
                                </div>

                            </div>
                        </div>
                @endforeach

                <!---->
                </div>
            </div>
            <!--左边导航结束-->
        </div>
    </div>
    <script type="text/javascript">
        (function () {
            var $subblock = $(".subpage"), $head = $subblock.find('h2'), $ul = $("#proinfo"), $lis = $ul.find("li"),
                inter = false;
            $head.mouseover(function (e) {
                e.stopPropagation();
                if (!inter) {
                    $ul.show();
                } else {
                    $ul.hide();
                }
                inter = !inter;
            });

            $ul.mouseover(function (event) {
                event.stopPropagation();
            });

            $(document).mouseover(function () {
                $ul.hide();
                inter = !inter;
            });
        })();
    </script>
    <!---->

    <div class="container" id="">

        <div class="cart-login-tip fl" id="idnotlogin" act-not-login-info="" style="display: none;">
            您还没有登录！登录后购物车的商品将保存到您账号中。
            <a class="cart-login-btn" href="dengl.html">
                立即登录
            </a>
        </div>
    </div>
    <div id="app">

            <template v-if="carts.length !==0">
            <div class="beij_center" >
                <div class="cart-main-header clearfix">

                    <div class="cart-col-3" style="margin-left: 135px">商品信息</div>
                    <div class="cart-col-4">
                        <div class="cart-good-real-price">单价</div>
                    </div>
                    <div class="cart-col-5">数量</div>
                    <div class="cart-col-6">
                        <div class="cart-good-amount">小计</div>
                    </div>
                    <div class="cart-col-7">操作</div>
                </div>
            </div>

            <div class="container">


                <div class="cart-shop-goods dangq_honh" v-for="(v,k) in carts">
                    <div class="cart-shop-good">
                        <div class="cart-col-1">
                            <input type="checkbox" name="box" class="jdcheckbox">
                        </div>
                        <div class="cart-col-2" style="height: 82px;">
                            <a :href="'/home/content/'+v.good_id" target="_blank" class="g-img"><img :src="v.pic" alt=""></a>
                        </div>
                        <div class="fl houj_c">
                            <div class="cart-dfsg">
                                <div class="cart-good-name"><a :href="'/home/content/'+v.good_id" target="_blank">@{{v.title}}</a></div>
                            </div>
                            <div class="cart-good-pro"></div>
                            <div class="cart-col-4">
                                <div class="cart-good-real-price "><!--主品-->¥&nbsp;@{{v.price}}</div>
                                <div class="red"></div>
                            </div>
                            <div class="cart-col-5">
                                <div class="gui-count cart-count">
                                    <a href="" gui-count-sub="" @click.prevent="del(v)" class="gui-count-btn gui-count-sub gui-count-disabled">-</a>
                                    <a href="#" gui-count-add="" @click.prevent="add(v)" class="gui-count-btn gui-count-add">+</a>
                                    <div class="gui-count-input">
                                        <input type="text"  @change="gengxin(v)" v-model="v.num">
                                    </div>
                                </div>
                            </div>
                            <div class="cart-col-6 ">
                                <div class="cart-good-amount">¥&nbsp;@{{ v.num*v.price  }}</div><!-- 重量展示(只展示全球百货的重量) --></div>
                        </div>
                        <div class="cart-col-7">
                            <div class="cart-good-fun delfixed">
                                <a href="javascript:;" @click="dels(v,k)">删除</a>
                            </div>

                        </div>
                    </div>
                </div>
                <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

            </div>
            <div class="jies_beij">
                <div class="beij_center over_dis">
                    <div class="cart-col-1 cart_jies">
                        <input type="checkbox" class="jdcheckbox" id="bottomall">
                    </div>
                    <div class="qianm_shanc_yvf">
                        <span>全选</span>
                        <a href="#">删除</a>
                    </div>
                    <div class="jies_ann_bei">
                        <p>已选 <em>@{{ carts.length }}</em> 件商品 总计（不含运费）：<span>￥@{{ totalPrice }}</span></p>
                        <a href="tij_dingd.html" class="order_btn">去结算</a>
                    </div>
                </div>
            </div>

            </template>
            <template v-if="carts.length ==0">
            <div class="beij_center">
                <div class="cart-main-header clearfix"
                     style="height: 200px !important;background-color: #FFFFFF !important;">
                    <div style="margin-top: 100px;margin-left: 300px">
                        <i class="layui-icon layui-icon-cart" style="font-size: 100px; color: #e40f0f"></i>
                        <span style="font-size: 20px;color: red">您还没有商品！快快去填充您的购物车把！！！</span>
                        <a class="cart-login-btn" href="dengl.html">
                            立即去填充
                        </a>
                    </div>
                </div>
            </div>
            </template>


    </div>

    <div class="beij_center">
        <div class="investment_f">
            <div class="investment_title">
                <div class="ds_dg on_d">为您推荐</div>
                <div class="ds_dg">最近预览</div>
            </div>
            <div class="investment_con">
                <!---->
                <div class="picScroll_left_s" style="display: block;">
                    <div class="hd">
                        <a class="next next_you"></a>
                        <ul></ul>
                        <a class="prev prev_zuo"></a>
                    </div>
                    <div class="bd">
                        <ul class="picList">
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi3.jpg"/></a>
                                </div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/shangq_3.jpg"/></a></div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/big_3.jpg"/></a></div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/xiangqtu_1.jpg"/></a>
                                </div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="images/lieb_tupi3.jpg"/></a>
                                </div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/big_3.jpg"/></a></div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="images/lieb_tupi1.jpg"/></a>
                                </div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi2.jpg"/></a>
                                </div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                            <li>
                                <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi3.jpg"/></a>
                                </div>
                                <div class="title">
                                    <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                    <div class="jiage_gouw"><span>¥2499.00</span></div>
                                    <a href="#" class="cart_scroll_btn">加入购物车</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!---->
                <div class="picScroll_left_s" style="display: none;">
                    <div class="picScroll_left_s_dsl">
                        <div class="dfgc">
                            <ul class="picList">
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi3.jpg"/></a>
                                    </div>
                                    <div class="title">
                                        <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                        <div class="jiage_gouw"><span>¥2499.00</span></div>
                                        <a href="#" class="cart_scroll_btn">加入购物车</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/big_3.jpg"/></a></div>
                                    <div class="title">
                                        <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                        <div class="jiage_gouw"><span>¥2499.00</span></div>
                                        <a href="#" class="cart_scroll_btn">加入购物车</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/lieb_tupi1.jpg"/></a>
                                    </div>
                                    <div class="title">
                                        <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                        <div class="jiage_gouw"><span>¥2499.00</span></div>
                                        <a href="#" class="cart_scroll_btn">加入购物车</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/big_3.jpg"/></a></div>
                                    <div class="title">
                                        <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                        <div class="jiage_gouw"><span>¥2499.00</span></div>
                                        <a href="#" class="cart_scroll_btn">加入购物车</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/shangq_3.jpg"></a>
                                    </div>
                                    <div class="title">
                                        <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                        <div class="jiage_gouw"><span>¥2499.00</span></div>
                                        <a href="#" class="cart_scroll_btn">加入购物车</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="pic"><a href="#" target="_blank"><img src="{{asset('org/home')}}/images/shangq_3.jpg"></a>
                                    </div>
                                    <div class="title">
                                        <a href="#" target="_blank">喜芬妮春秋桑蚕丝长袖性感蕾丝花边女式睡衣家居服二</a>
                                        <div class="jiage_gouw"><span>¥2499.00</span></div>
                                        <a href="#" class="cart_scroll_btn">加入购物车</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.message')
    <script>


        new Vue({
            el: "#app",
            data: {
                carts:{!! $carts !!}
            },
            methods: {

                //增加
                add(v){
                    v.num++
                    this.update(v)
                },
                del(v){
                    if (v.num<=1){
                        return false
                    }
                    v.num--
                    this.update(v)
                },
                dels(v,k){

                    axios.delete('/home/cart/'+v.id).then( (response) => {
                        if (response.data.code==200){
                            this.carts.splice(k,1);
                        }
                    })

                },

                update(v){
                    axios.put("/home/cart/"+v.id,{
                        num: v.num,
                    }).then(function (response) {
                        //console.log(response);
                    });
                }

            },
//计算属性
            computed:{
                totalPrice(){
                    let total = 0;
                    this.carts.forEach((v,k)=>{
                            total += v.price * v.num;
                    })
                    return total;
                }
            }

        })

    </script>
    <script type="text/javascript">
        $(function () {

            /*tab标签切换*/
            function tabs(tabTit, on, tabCon) {
                $(tabCon).each(function () {
                    $(this).children().eq(0).show();

                });
                $(tabTit).each(function () {
                    $(this).children().eq(0).addClass(on);
                });
                $(tabTit).children().click(function () {
                    $(this).addClass(on).siblings().removeClass(on);
                    var index = $(tabTit).children().index(this);
                    $(tabCon).children().eq(index).show().siblings().hide();
                });
            }

            tabs(".investment_title", "on_d", ".investment_con");

            $("#topall").click(function () {

                // this 全选的复选框
                var userids = this.checked;
                //获取name=box的复选框 遍历输出复选框
                $("input[name=box]").each(function () {
                    this.checked = userids;
                });
            });
            $("#bottomall").click(function () {

                // this 全选的复选框
                var userids = this.checked;
                //获取name=box的复选框 遍历输出复选框
                $("input[name=box]").each(function () {
                    this.checked = userids;
                });
            });

            //给name=box的复选框绑定单击事件
            $("input[name=box]").click(function () {
                //获取选中复选框长度
                var length = $("input[name=box]:checked").length;
                //未选中的长度
                var len = $("input[name=box]").length;
                if (length == len) {
                    $("#all").get(0).checked = true;
                } else {
                    $("#all").get(0).checked = false;
                }
            });


        })

    </script>
    <script type="text/javascript">
        jQuery(".picScroll_left_s").slide({
            titCell: ".hd ul",
            mainCell: ".bd ul",
            autoPage: true,
            effect: "left",
            autoPlay: true,
            vis: 5,
            trigger: "click"
        });
    </script>


@endsection







