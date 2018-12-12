@extends('admin.layouts.index')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">月</span>
                        <h5>收入</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">40 886,200</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i>
                        </div>
                        <small>总收入</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">全年</span>
                        <h5>订单</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">275,800</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i>
                        </div>
                        <small>新订单</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">今天</span>
                        <h5>访客</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">106,120</h1>
                        <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i>
                        </div>
                        <small>新访客</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">最近一个月</span>
                        <h5>活跃用户</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">80,600</h1>
                        <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i>
                        </div>
                        <small>12月</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>消息</h5>

                    </div>
                    <div class="ibox-content ibox-heading">
                        <h3><i class="fa fa-envelope-o"></i> 新消息</h3>
                        <small><i class="fa fa-tim"></i> 您有22条未读消息</small>
                    </div>
                    <div class="ibox-content">
                        <div class="feed-activity-list">



                            <div class="feed-element">
                                <div>
                                    <small class="pull-right">5月前</small>
                                    <strong>娱乐小主 </strong>
                                    <div>你是否想过记录自己的梦？你是否想过有自己的一个记梦本？小时候写日记，没得写了就写昨晚的梦，后来变成了习惯………翻了一晚上自己做过的梦，想哭，想笑…</div>
                                    <small class="text-muted">11月8日 20:08 </small>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>系统环境</h5>

                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover no-margins">
                                    <thead>
                                    <tr>
                                        <th>名称</th>

                                        <th>值</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><small>php 版本</small>
                                        </td>
                                        <td class="text-navy"><span class="label label-warning">{{PHP_VERSION}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Laravel 版本
                                        </td>

                                        <td class="text-navy"><span class="label label-warning">  5.7.16</span></td>
                                    </tr>
                                    <tr>
                                        <td><small>操作系统</small>
                                        </td>
                                        <td class="text-navy"><span class="label label-warning">linux</span></td>
                                    </tr>
                                    <tr>
                                        <td><small>商城版本</small>
                                        </td>
                                        <td class="text-navy"><span class="label label-warning"> v1.0.0</span></td>
                                    </tr>
                                    <tr>
                                        <td><small>当前域名</small>
                                        </td>
                                        <td class="text-navy"><span class="label label-warning"> {{$_SERVER['SERVER_NAME']}}</span></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>开发新型</h5>

                            </div>
                            <div class="ibox-content">
                                <ul class="todo-list m-t small-list ui-sortable">


                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">开发者</span>
                                        <small class="label label-primary " style="margin-left: 74px !important;">Gao Bin</small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">联系开发者</span>
                                        <small class="label label-success" style="margin-left: 50px !important;"> xiaoyaogaobin@vip.qq.com</small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">github</span>
                                        <small class="label label-light" style="margin-left: 74px !important;"><a href="https://github.com/xiaoyaogaobin/" target="_blank">https://github.com/xiaoyaogaobin/</a> </small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">个人站</span>
                                        <small class="label label-danger" style="margin-left: 74px !important;">soueo.cn</small>
                                    </li>
                                    <li>
                                        <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                        <span class="m-l-xs">微信/qq</span>
                                        <small class="label label-primary" style="margin-left: 69px !important;"> 15163640385</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection

