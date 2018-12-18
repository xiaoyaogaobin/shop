@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">手机配置</a>
            </div>
        </nav>

        </button>

        <a href="{{asset(route('admin.loginout'))}}" class="roll-nav roll-right J_tabExit"><i
                class="fa fa fa-sign-out"></i> 退出</a>
    </div>
    <div class="wrapper wrapper-content">
        {{--内容添加--}}
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>短信宝
                        <small class="text-danger">本商城系统使用<a href="http://www.smsbao.com/">短信宝</a></small>
                    </h5>


                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('admin.config.update',['name'=>$name])}} " id="myform">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">短信宝账号(iphon_user)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['iphone_user']??'xiaoyaogaobin'}}" placeholder="上传单位为B"  name="iphone_user" class="form-control">
                            </div>
                        </div>


                        {{--商品列表图片--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">短信宝密码(iphone_password)
                            </label>
                            <div class="col-sm-10">
                                <input type="password" value="{{$config['data']['iphone_password']??'gaobin'}}" placeholder="root"  name="iphone_password" class="form-control">
                            </div>
                            <span class="help-block m-b-none text-info " style="    margin-left: 250px !important;padding-top:35px!important;">谨慎填写密码</span>
                        </div>
                        {{--商品图册--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">短信宝注册内容(iphone_register)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['iphone_register']??'<$code>'}}"placeholder="root" name="iphone_register" class="form-control">
                            </div>
                            <span class="help-block m-b-none  text-danger " style="    margin-left: 250px !important;padding-top:35px!important;">短信宝账户注册内容,格式如<$code></span>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">短信宝密码重置内容(iphone_reset)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['iphone_reset']??'<$code>'}}"placeholder="root" name="iphone_reset" class="form-control">
                            </div>
                            <span class="help-block m-b-none  text-danger " style="    margin-left: 250px !important;padding-top:35px!important;">填写短信密码找回内,格式如<$code></span>
                        </div>
                        <div class="hr-line-dashed"></div>

                        {{--商品详情结束--}}
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">保存内容</button>
                                <a href="javacript:;" class="btn btn-white" id="resets">
                                    重置</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.message')
        {{--内容添加结束--}}
    </div>
@endsection
@push('js')


    <script>

    $(function () {
        $('#resets').click(function () {

            $('#myform')[0].reset();
        })
    })
    </script>

@endpush



