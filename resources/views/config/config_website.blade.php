@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">网站基本配置</a>
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
                    <h5>网站基本配置
                        <small class="text-danger">请谨慎填写你的基本配置</small>
                    </h5>


                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('admin.config.update',['name'=>$name])}} " id="myform">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站名称(site_name)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['site_name']??''}}" placeholder="请输入网站名称"  name="site_name" class="form-control">
                            </div>
                        </div>


                        {{--商品列表图片--}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站 logo(site_logo)
                            </label>

                            <div class="col-sm-10">
                                <div class="layui-upload-drag" id="test10">
                                    <img src="{{$config['data']['site_logo']??''}}" width="300px" height="80px"/>
                                    <input type="hidden" name="site_logo" value="{{$config['data']['site_logo']??''}}">
                                </div>
                            </div>
                        </div>
                        {{--商品图册--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">icp 备案信息(site_icp)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['site_icp']??''}}" placeholder="请输入网站icp" name="site_icp" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        {{--qq号码--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">QQ(site_qq)
                            </label>

                            <div class="col-sm-10">
                                <input type="number" value="{{$config['data']['site_qq']}}" placeholder="请添加你的qq号码" name="site_qq" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站 关键词(site_keywords)
                            </label>

                            <div class="col-sm-10">

                                    <input type="text" value="{{$config['data']['site_keywords']??''}}" placeholder="请输入网站关键词"  name="site_keywords" class="form-control">

                            </div>
                        </div>
                        {{--商品图册--}}
                        <div class="hr-line-dashed"></div>
                        {{--描述--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站 描述(site_description)
                            </label>

                            <div class="col-sm-10">

                                    <input type="text" value="{{$config['data']['site_description']??''}}" placeholder="请输入网站描述"  name="site_description" class="form-control">

                            </div>
                        </div>
                        {{--商品图册--}}
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
    <script src="https://cdn.bootcss.com/vue/2.5.18-beta.0/vue.min.js"></script>

    <script>

    $(function () {
        $('#resets').click(function () {

            $('#myform')[0].reset();
        })
    })

    layui.use(['upload','layedit'], function () {
        var $ = layui.jquery
            , upload = layui.upload;
        var layedit = layui.layedit;

        layedit.build('demo', {
            //tool: ['left', 'center', 'right', '|', 'face'],//自定义 tollbar
            height: 180 //设置编辑器高度
            , uploadImage: {
                url: "{{route('util.upload')}}",
                type: 'post'
            }
        });
        //拖拽上传
        upload.render({
            elem: '#test10'
            , url: "{{route('util.upload')}}"
            , data: {
            }
            , headers: {}//接口的请求头。如：headers: {token: 'sasasas'}。注：该参数为 layui 2.2.6 开始新增
            , accept: 'images' //指定允许上传时校验的文件类型，可选值有：images（图片）、file（所有文件）、video（视频）、audio（音频）
            , acceptMime: '{{shop_config('upload.upload_accept_mime')}}'
            , size: {{shop_config('upload.upload_size')}} //最大允许上传的文件大小，单位 KB。不支持ie8/9
            , exts: '{{shop_config('upload.upload_type')}}'
            //,drag:true //是否接受拖拽的文件上传，设置 false 可禁用。不支持ie8/9
            //上传成功之后的回调
            , done: function (res) {

                let {code, data, msd} = res


                if(code == 0) {
                    $('#test10').html(`<img src = "${data['src']}" width="50px" height="50px">
                    <input name="site_logo" type="hidden" value="${data['src']}"/>`)
                }else{
                    swal({
                        text: res.message,
                        icon: "warning",
                        button: false
                    });
                }

            }
        });


    });




    </script>

@endpush



