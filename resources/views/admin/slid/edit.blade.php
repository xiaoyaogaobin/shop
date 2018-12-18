@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">添加栏目</a>
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
                    <h5>商品添加
                        <small class="text-danger">商品名称不能重复</small>
                    </h5>


                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal layui-form" action="{{route('admin.slid.update',$slid)}}">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">轮播图链接</label>

                            <div class="col-sm-10">
                                <input type="text"value="{{$slid['links']}}"  name="links" class="form-control">
                            </div>
                        </div>


                        <div class="hr-line-dashed"></div>


                        {{--商品列表图片--}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">轮播图片</label>

                            <div class="col-sm-10">
                                <div class="layui-upload-drag" id="test10">

                                        <img src="{{$slid['picture']}}" width="50px" height="50px">
                                        <input name="picture" type="hidden" value="{{$slid['picture']}}">

                                </div>
                            </div>
                        </div>
                        {{--商品图册--}}



                        {{--商品详情结束--}}
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">保存</button>
                                <a href="{{route('admin.slid.index')}}" class="btn btn-white">
                                    返回首页</a>

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
        function delImage(obj){

            $(obj).remove();
        }
        layui.use(['upload','layedit'], function () {
            var $ = layui.jquery
                , upload = layui.upload;

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
                    <input name="picture" type="hidden" value="${data['src']}"/>`)
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



