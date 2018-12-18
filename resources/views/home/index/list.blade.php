@extends('home.layouts.master')
@section('title')
    <title>欢迎您来到{{shop_config('website.site_name')}}商城列表页_{{$categoriess['name']}}</title>
    <link href="https://cdn.bootcss.com/layer/2.3/skin/layer.css" rel="stylesheet">
    <link href="{{asset('org/layui/css/layui.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('org/home')}}/css/ziy.css">

    @endsection
@section('content')


<!--侧边-->

<!--轮播图上方导航栏  一栏-->
<div id="navv" class="navv_ziy">
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
                $i =0 ?>

                @foreach($_categories as $v)
                    <?php $i++ ?>
                   @if($i<6)
                    <li><a href="{{route ('home.list',['list'=>$v['id']])}}">{{$v->name}}</a></li>
                    @endif
                @endforeach


            </ul>
        </div>

        <!--左边导航-->
        <script type="text/javascript">
            window.onload=function()
            {
                var aid=document.getElementById('id_a');
                var odiv=document.getElementById('h2_d');
                var bdiv=document.getElementById('proinfo');
                aid.onmouseover=function()
                {

                    bdiv.style.display='block';
                };
                aid.onmouseout=function()
                {
                    bdiv.style.display='none';
                };

            };
        </script>
        <div class="subpage" id="id_a">
            <h2 id="h2_d" ></h2>
            <div class="prosul dd-inner dd_inner_ziy" id="proinfo">
                @foreach($categoryData as $v)
                    <div class="fore-2">
                        <div class="item fore1">
                            <h3>
                                <a class="da_zhu" href="{{route ('home.list',['list'=>$v['id']])}}">{{$v['name']}}</a>
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
                                        <dt><a href="{{route ('home.list',['list'=>$vv['id']])}}">{{$vv['name']}}<i>></i></a></dt>


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

<!--列表一开了-->
<div class="nSearchWarp">
    <div class="hot-tj">
        <span class="icon_tj">热卖<br>推荐</span>
        <ul class="hot-list clearfix">
            <li class="item asynPriceBox">
                <p class="pic">
                    <a target="_blank" href="#"><img src="images/lieb_tupi1.jpg" alt=""></a>
                </p>
                <p class="name"><a href="#" title=" 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑"> 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑 </a></p>
                <p class="price asynPrice" >¥3999.00</p>
                <p class="btn"><a class="buy" href="#" >立即抢购</a></p>
            </li>
            <li class="item asynPriceBox">
                <p class="pic">
                    <a target="_blank" href="#"><img src="images/lieb_tupi2.jpg" alt=""></a>
                </p>
                <p class="name"><a href="#" title=" 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑"> 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑 </a></p>
                <p class="price asynPrice" >¥3999.00</p>
                <p class="btn"><a class="buy" href="#" >立即抢购</a></p>
            </li>
            <li class="item asynPriceBox">
                <p class="pic">
                    <a target="_blank" href="#"><img src="images/lieb_tupi3.jpg" alt=""></a>
                </p>
                <p class="name"><a href="#" title=" 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑"> 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑 </a></p>
                <p class="price asynPrice" >¥3999.00</p>
                <p class="btn"><a class="buy" href="#" >立即抢购</a></p>
            </li>
            <li class="item asynPriceBox">
                <p class="pic">
                    <a target="_blank" href="#"><img src="images/lieb_tupi1.jpg" alt=""></a>
                </p>
                <p class="name"><a href="#" title=" 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑"> 联想(lenovo) 小新潮5000 15.6英寸轻薄笔记本电脑 </a></p>
                <p class="price asynPrice" >¥3999.00</p>
                <p class="btn"><a class="buy" href="#" >立即抢购</a></p>
            </li>
        </ul>
    </div>
</div>


<!--!!!-->
<div class="lujing_ziy">
    @foreach($getFather as $v)
        <a href="/">首页</a>
        >
    <a href="{{route('home.list',['list'=>$v['id']])}}">{{$v['name']}}</a>
    @endforeach

</div>
<div class="shangp_lieb_jvz">
    <div class="selector">

        <div class="J_selectorLine s-line J_selectorFold" >

            <div class="sl-wrap">
                <div class="sl-key">
                    <span>价格：</span>
                </div>
                <div class="sl-value">
                    <div class="sl-v-list">
                        <ul class="J_valueList">
                            <li>
                                <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">10-100</a>
                            </li>
                            <li>
                                <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">100-500</a>
                            </li>
                            <li>
                                <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">500以上</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sl-ext">
                    <a class="sl-e-more" style="visibility: visible;">更多<i></i></a>
                    <a class="sl-e-multiple">多选<i></i></a>
                </div>
            </div>
            <div class="sl-wrap">
                <div class="sl-key">
                    <span>分类：</span>
                </div>
                <div class="sl-value">
                    <div class="sl-v-list">
                        <ul class="J_valueList">
                            @foreach($categoryData as $category)
                            <li>
                                <a href="{{route('home.list',['list'=>$category['id']])}}"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">{{$category['name']}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="sl-ext">
                    <a class="sl-e-more" style="visibility: visible;">更多<i></i></a>
                    <a class="sl-e-multiple">多选<i></i></a>
                </div>
            </div>
            <div id="yingc">
                <div class="sl-wrap">
                    <div class="sl-key">
                        <span>风格：</span>
                    </div>
                    <div class="sl-value">
                        <div class="sl-v-list">
                            <ul class="J_valueList">
                                <li>
                                    <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">简约</a>
                                </li>
                                <li>
                                    <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">卡通动漫</a>
                                </li>
                                <li>
                                    <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">商务</a>
                                </li>
                                <li>
                                    <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">奢华</a>
                                </li>
                                <li>
                                    <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">小清新</a>
                                </li>
                                <li>
                                    <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">怀旧</a>
                                </li>
                                <li>
                                    <a href="#"  rel='nofollow'><input type="checkbox" class="checkbox yingc_df">轻奢主义</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sl-ext">
                        <a class="sl-e-more" style="visibility: visible;">更多<i></i></a>
                        <a class="sl-e-multiple">多选<i></i></a>
                    </div>
                </div>
            </div>
            <div class="s_more">
                <span class="sm-wrap" onclick="xians()" data-more="材质、风格、选购热点 等">更多选项（ 材质、风格、选购热点 等）<i></i></span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function xians()
        {
            var ddd=document.getElementById('yingc');
            if(ddd.style.display=='block')
            {
                ddd.style.display='none';
            }
            else
            {
                ddd.style.display='block';
            }
        }
    </script>
    <!--测试****************************************-->

    <!--测试****************************************-->
    <!--列表-->
    <div class="shangp_lieb_yi">
        <div class="filter_yi">
            <div class="f_line">
                <div class="f_sort">
                    <a href="#" class="curr_1"><label>综合排序</label> <i></i></a>
                    <a href="#" class="curr_2">销量<i></i></a>
                    @if(request ()->query('price') == 'asc')
                    <a href="{{route('home.list',['list'=>$list,'price'=>'desc'])}}" class="curr_2">价格<i></i></a>
                    @else
                        <a href="{{route('home.list',['list'=>$list,'price'=>'asc'])}}" class="curr_2">价格<i></i></a>
                    @endif
                    <a href="#" class="curr_2">评论数<i></i></a>
                    <a href="#" class="curr_2">上架时间<i></i></a>
                </div>
                <div class="f_pager" id="J_topPage">
           			<span class="fp_text">
               			<b>1</b><em>/</em><i>166</i>
          			</span>
                    <a class="fp_prev disabled" href="#"> &lt; </a>
                    <a class="fp_next" href="#"> &gt; </a>
                </div>

            </div>

        </div>
        <div class="shnagp_list_v1">
            <ul>
                @foreach($goods as $v)
                <li>
                    <div class="lieb_neir_kuang">
                        <div class="lieb_img">
                            <a href="{{route('home.content',['content'=>$v['id']])}}"><img src="{{$v['list_pic']}}"></a>
                            <div class="p_focus"><a class="J_focus" href="#"><i></i>关注</a></div>
                        </div>
                        <div class="lieb_text">
                            <div class="p_price">
                                <strong class="J_price"><em>¥</em><i>{{$v['price']}}</i><em class="shangp_yuanj zuo_ji">¥</em><i class="shangp_yuanj">1099.00</i></strong>
                            </div>
                        </div>
                        <div class="shangp_biaot_"><a href="{{route('home.content',['content'=>$v['id']])}}">{{$v['title']}}</a></div>
                        <div class="lieb_dianp_mingc">
                            <div class="zuo_mingc">
                                <p><a class="lianpu_minc" href="#">古竣服装专营店</a>
                                    <a class="mis" href="#">qq交谈</a>
                                </p>
                                <div class="p_icons">
                                    <i class="icon_grou_1" data-tips="本地商品"><img src="{{asset('org/home')}}/images/bend.png"></i>
                                    <i class="icon_grou_2" data-tips="商品特价出售">特价</i>
                                </div>
                            </div>
                            <div class="you_pingj">
                                <p>已有评价</p>
                                <span><a href="#"><em>100+</em></a> 人</span>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

            <div>
                {{$goods->appends(['price' => request ()->query('price')])->links('vendor.pagination.list')}}
            </div>
        </div>
    </div>
</div>

<!--列表一结束-->
<!--猜你喜欢-->
<div class="cain_xih">
    <div class="mt">
        <h2 class="title">猜你喜欢</h2>
        <div class="extra">
            <a href="#" class="change"><i class="ico"></i><span class="txt">换一批</span></a>
        </div>
    </div>
    <ul class="cain_xihuan_neir">
        <li>
            <div class="item_pic"><a href="#"><img src="images/lieb_tupi1.jpg"></a></div>
            <div class="cain_xih_biaot"><a href="#">伊秋梦紫 2017夏季新款韩版小清新中长款碎花雪纺连衣裙8819(米白色 XXL棉麻连衣裙，舒适透气，MM</a></div>
            <div class="cain_xih_jiaq"><p>￥560.00</p></div>
        </li>
        <li>
            <div class="item_pic"><a href="#"><img src="images/lieb_tupi2.jpg"></a></div>
            <div class="cain_xih_biaot"><a href="#">伊秋梦紫 2017夏季新款韩版小清新中长款碎花雪纺连衣裙8819(米白色 XXL棉麻连衣裙，舒适透气，MM</a></div>
            <div class="cain_xih_jiaq"><p>￥560.00</p></div>
        </li>
        <li>
            <div class="item_pic"><a href="#"><img src="images/lieb_tupi3.jpg"></a></div>
            <div class="cain_xih_biaot"><a href="#">伊秋梦紫 2017夏季新款韩版小清新中长款碎花雪纺连衣裙8819(米白色 XXL棉麻连衣裙，舒适透气，MM</a></div>
            <div class="cain_xih_jiaq"><p>￥560.00</p></div>
        </li>
        <li>
            <div class="item_pic"><a href="#"><img src="images/lieb_tupi1.jpg"></a></div>
            <div class="cain_xih_biaot"><a href="#">伊秋梦紫 2017夏季新款韩版小清新中长款碎花雪纺连衣裙8819(米白色 XXL棉麻连衣裙，舒适透气，MM</a></div>
            <div class="cain_xih_jiaq"><p>￥560.00</p></div>
        </li>
        <li>
            <div class="item_pic"><a href="#"><img src="images/lieb_tupi3.jpg"></a></div>
            <div class="cain_xih_biaot"><a href="#">伊秋梦紫 2017夏季新款韩版小清新中长款碎花雪纺连衣裙8819(米白色 XXL棉麻连衣裙，舒适透气，MM</a></div>
            <div class="cain_xih_jiaq"><p>￥560.00</p></div>
        </li>
        <li>
            <div class="item_pic"><a href="#"><img src="images/lieb_tupi2.jpg"></a></div>
            <div class="cain_xih_biaot"><a href="#">伊秋梦紫 2017夏季新款韩版小清新中长款碎花雪纺连衣裙8819(米白色 XXL棉麻连衣裙，舒适透气，MM</a></div>
            <div class="cain_xih_jiaq"><p>￥560.00</p></div>
        </li>
    </ul>
</div>

>
@endsection
<!--底部-->


