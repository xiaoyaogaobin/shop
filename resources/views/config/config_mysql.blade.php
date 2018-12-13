@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">数据库配置</a>
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
                    <h5>数据库配置
                        <small class="text-danger">请谨慎填写你的数据库配置</small>
                    </h5>


                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('admin.config.update',['name'=>$name])}} " id="myform">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">数据库名字(DB_DATABASE)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['DB_DATABASE']??''}}" placeholder="上传单位为B"  name="DB_DATABASE" class="form-control">
                            </div>
                        </div>


                        {{--商品列表图片--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">数据库账号(upload_type)
                            </label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['DB_USERNAME']??'root'}}" placeholder="root"  name="DB_USERNAME" class="form-control">
                            </div>
                            <span class="help-block m-b-none text-info " style="    margin-left: 250px !important;padding-top:35px!important;">填写数据库账号时候请谨慎</span>
                        </div>
                        {{--商品图册--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">数据库密码(upload_accept_mime)
                            </label>

                            <div class="col-sm-10">
                                <input type="password" value="{{$config['data']['DB_PASSWORD']??''}}"placeholder="root" name="DB_PASSWORD" class="form-control">
                            </div>
                            <span class="help-block m-b-none  text-danger " style="    margin-left: 250px !important;padding-top:35px!important;">填写数据库密码的时候请谨慎</span>
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



