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
                    <form method="post" class="form-horizontal" action="{{route('admin.category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品名称</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品价格</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        {{--商品规格--}}
                        <div id = 'app' class="form-group">
                            <label class="col-sm-2 control-label">商品规格</label>

                            <div class="col-sm-10">
                                {{--父级循环--}}
                                <div class="layui-card">
                                    <div class="layui-card-header">商品规格</div>
                                    <div class="layui-card-body">
                                        <div class="shopspec ">
                                            <div class="input-group m-b"><span class="input-group-addon">商品名称</span>
                                                <input type="text" placeholder="请输入你的商品名称" class="form-control">
                                            </div>
                                            <div class="input-group m-b"><span class="input-group-addon">库存总量</span>
                                                <input type="text" placeholder="请填入你的库存" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{--父级循环结束--}}
                                {{--添加类别--}}

                                <div class="layui-card">
                                    <div class="layui-card-header">商品规格</div>
                                    <div class="layui-card-body">
                                        <div class="shopspec ">
                                            <div class="input-group m-b"><span class="input-group-addon">商品名称</span>
                                                <input type="text" placeholder="请输入你的商品名称" class="form-control">
                                            </div>
                                            <div class="input-group m-b"><span class="input-group-addon">库存总量</span>
                                                <input type="text" placeholder="请填入你的库存" class="form-control">
                                            </div>
                                        </div>
                                        <button class="layui-btn layui-btn-sm layui-btn-primary "><i class="layui-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                {{--添加列表结束--}}
                                <button class="layui-btn layui-btn-radius" type="button"><i
                                        class="layui-icon">&#xe608;</i>增加
                                </button>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        {{--商品规格结束--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品分类</label>

                            <div class="col-sm-10">
                                <div class="input-group">


                                    <div class="input-group-btn">
                                        <select name="pid" class="form-control custom-select dropdown-toggle"
                                                data-placeholder="Choose a Category" tabindex="1">
                                            <option value="0">顶级栏目</option>
                                            @foreach($categorys as $category)
                                                <option value="{{$category['id']}}">{!! $category['_name'] !!}</option>
                                            @endforeach

                                        </select>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        {{--商品列表图片--}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品列表图片</label>

                            <div class="col-sm-10">
                                <div class="layui-upload-drag" id="test10">
                                    <i class="layui-icon"></i>
                                    <p>点击上传，或将文件拖拽到此处</p>
                                </div>
                            </div>
                        </div>
                        {{--商品图册--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品图册</label>

                            <div class="col-sm-10">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="test2">图片上传</button>
                                    <input class="layui-upload-file" type="file" accept="undefined" name="file"
                                           multiple="">
                                    <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                        预览图：
                                        <div class="layui-upload-list" id="demo2"></div>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        {{--商品描述--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品描述</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        {{--商品详情--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品详情</label>

                            <div class="col-sm-10">
                                <textarea id="demo" style="display: none;"></textarea>
                            </div>
                        </div>
                        {{--商品详情结束--}}
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">保存内容</button>
                                <a href="{{route('admin.category.index')}}" class="btn btn-white">
                                    返回栏目</a>

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
        layui.use(['upload', 'layedit'], function () {
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
                , acceptMime: 'image/jpg, image/png'
                , size: 50000000000 //最大允许上传的文件大小，单位 KB。不支持ie8/9
                , exts: 'jpg|png'
                //,drag:true //是否接受拖拽的文件上传，设置 false 可禁用。不支持ie8/9
                //上传成功之后的回调
                , done: function (res) {

                    let {code, data, msd} = res


                    if(code == 0) {
                        $('#test10').html(`<img src = "${data['src']}" width="50px" height="50px">
                    <input name="" type="hidden" value="${data['src']}"/>`)
                    }else{
                        swal({
                            text: res.message,
                            icon: "warning",
                            button: false
                        });
                    }

                }
            });

            //多图上传
            upload.render({
                elem: '#test2'
                , url: "{{route('util.upload')}}"
                , data: {
                }
                , multiple: true
                , accept: 'images' //指定允许上传时校验的文件类型，可选值有：images（图片）、file（所有文件）、video（视频）、audio（音频）
                , acceptMime: 'image/jpg, image/png'
                , size: 50000000000 //最大允许上传的文件大小，单位 KB。不支持ie8/9
                , exts: 'jpg|png'
                // ,before: function(obj){
                //     //预读本地文件示例，不支持ie8
                //     obj.preview(function(index, file, result){
                //         $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                //     });
                // }
                , done: function (res) {
                    //上传完毕
                    $('#demo2').append('<img src="' + res.data.src + '" alt="" width="50" height="50" class="layui-upload-img">' +
                        '<input type="hidden" name="" value="' + res.data.src + '">'
                    )
                }
            });
        });
        // vue 添加
        new Vue({
            el:'#app',
            // 数据
            data:{},
            // 接受方法
            methods:{

            }

        })
    </script>

@endpush



