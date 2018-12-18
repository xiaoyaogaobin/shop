<div id="navv">
    <div class="focus">
        <div class="focus-a">
            <div class="fouc-font"><a href="">全部商品分类</a></div>
        </div>
        <div class="focus-b">
            <ul>
                <li><a href="/">商城首页</a></li>
                <?php
                $i = 0
                ?>
                <p>
                @foreach($_categories as $v)
                    <?php $i++;?>
                    @if($i<5)
                    <li><a href="{{route ('home.list',['list'=>$v['id']])}}">{{$v->name}}</a></li>
                        @endif
                @endforeach
            </ul>
        </div>


        <!--左边导航-->
        <div class="dd-inner">
            <?php
            $v = 0
            ?>
            <p>
            @foreach($categoryData as $v)

                <div class="fore-2">
                    <div class="item fore1">
                        <h3>
                            <a class="da_zhu" href="{{route ('home.list',['list'=>$v['id']])}}">{{$v['name']}}</a>
                                 <?php $i = 0 ?>
                            <p>@foreach($v['_data'] as $vv)
                                    <?php $i++;?>
                                    @if($i<5)
                                        <a href="{{route ('home.list',['list'=>$vv['id']])}}">{{$vv['name']}}</a>
                                    @endif
                                @endforeach</p>
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
</div>
<!--轮播图-->
<div id="lunbo">
    <ul id="one">
        @foreach($slids  as $slid )
        <li><a href="{{$slid->links}}" target="_blank"><img src="{{$slid->picture}}"></a></li>
        @endforeach
    </ul>
    <ul id="two">
        @foreach($slids  as $slid )
        <li >{{$slid->id}}</li>
        @endforeach
    </ul>
    <!--轮播图左右箭头-->
    <div class="slider-page">
        <a href="javascript:void(0)" id="left"><</a>
        <a href="javascript:void(0)" id="right">></a>
    </div>
</div>
