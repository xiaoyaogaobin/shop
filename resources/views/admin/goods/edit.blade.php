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
                    <form method="post" class="form-horizontal layui-form" action="{{route('admin.goods.update',$goods)}}">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品名称</label>

                            <div class="col-sm-10">
                                <input type="text"value="{{$goods['title']}}"  name="title" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">打折商品价格</label>

                            <div class="col-sm-10">
                                <input type="number" value="{{old('oldgoods')}}" name="oldgoods" class="form-control">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品价格</label>

                            <div class="col-sm-10">
                                <input type="number" value="{{$goods['price']}}" name="price" class="form-control">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        {{--首页推荐--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">首页推荐</label>

                            <div class="layui-input-block">
                                <input type="radio" name="hot_id" value="1" title="推荐" @if($goods['hot_id'] == 1) checked @endif>
                                <div class="layui-unselect layui-form-radio  ">
                                    <i class="layui-anim layui-icon layui-anim-scaleSpring "  ></i><div>推荐</div>
                                </div>
                                <input type="radio" name="hot_id" value="0" title="不推荐" @if($goods['hot_id'] == 0) checked @endif>
                                <div class="layui-unselect layui-form-radio ">
                                    <i class="layui-anim layui-icon "  ></i><div>不推荐</div></div>
                            </div>

                        </div>

                        <div class="hr-line-dashed"></div>
                        {{--商品规格--}}
                        <div id = 'app' class="form-group">
                            <label class="col-sm-2 control-label" >商品规格</label>

                            <div class="col-sm-10" >
                                {{--父级循环--}}
                                <div class="layui-card" v-for="(v,k) in specs">
                                    <div class="layui-card-header">商品规格</div>
                                    <div class="layui-card-body">
                                        <div class="shopspec ">
                                            <div class="input-group m-b"><span class="input-group-addon">商品规格</span>
                                                <input type="text" placeholder="请输入你的商品名称" v-model="v.spec" class="form-control">
                                            </div>
                                            <div class="input-group m-b"><span class="input-group-addon">库存总量</span>
                                                <input type="number" placeholder="请填入你的库存" v-model="v.total" class="form-control">
                                            </div>
                                            <button class="layui-btn layui-btn-sm layui-btn-primary " type="button" @click="del(k)">
                                                <i class="layui-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{--父级循环结束--}}
                                {{--添加类别--}}
                                <textarea name="specs" id="" cols="30" rows="10" hidden>
                                    @{{specs}}
                                </textarea>

                                {{--添加列表结束--}}
                                <button class="layui-btn layui-btn-radius" type="button" @click="add"><i
                                        class="layui-icon">&#xe608;</i>增加规格
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
                                        <select name="category_id" class="form-control custom-select dropdown-toggle"
                                                data-placeholder="Choose a Category" tabindex="1">
                                            <option value="0">顶级栏目</option>
                                            @foreach($categorys as $category)
                                                <option value="{{$category['id']}}" @if($goods['category_id']==$category['id'])  selected @endif>{!! $category['_name'] !!}</option>
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
                                    <img src="{{$goods['list_pic']}}" width="50px" height="50px" name="list_pic">
                                    <input type="hidden" value="{{$goods['list_pic']}}" name="list_pic">
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
                                        <div class="layui-upload-list" id="demo2">
                                            @foreach($goods->pics as $v)
                                                <span  onclick="delImage(this)">
                                                    <button class="layui-btn layui-btn-xs "  style="position: absolute;margin-left: 53px" type="button" >
                                                        <i class="layui-icon"></i></button>
                                                <img src={{$v}} width="80px" height="80px" name=" pics[]" >

                                                <input type="hidden" value="{{$v}}" name="pics[]" >
                                                </span>
                                                @endforeach

                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        {{--商品描述--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品描述</label>

                            <div class="col-sm-10">
                                <textarea class="form-control"value="{{old('description')}}" rows="5" name="description">{{$goods['description']
                                }}</textarea>
                            </div>
                        </div>
                        {{--商品详情--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品详情</label>

                            <div class="col-sm-10">
                                <textarea id="demo" style="display: none;" value="{{old('content')}}" name="content">

                                    {{$goods['content']}}</textarea>
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

    <script src="https://cdn.bootcss.com/vue/2.5.18-beta.0/vue.min.js"></script>
    <script>
        function delImage(obj){

            $(obj).remove();
        }
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
                , acceptMime: '{{shop_config('upload.upload_accept_mime')}}'
                , size: {{shop_config('upload.upload_size')}} //最大允许上传的文件大小，单位 KB。不支持ie8/9
                , exts: '{{shop_config('upload.upload_type')}}'
                //,drag:true //是否接受拖拽的文件上传，设置 false 可禁用。不支持ie8/9
                //上传成功之后的回调
                , done: function (res) {

                    let {code, data, msd} = res


                    if(code == 0) {
                        $('#test10').html(`<img src = "${data['src']}" width="50px" height="50px">
                    <input name="list_pic" type="hidden" value="${data['src']}"/>`)
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
                , acceptMime: '{{shop_config('upload.upload_accept_mime')}}'
                , size: {{shop_config('upload.upload_size')}} //最大允许上传的文件大小，单位 KB。不支持ie8/9
                , exts: '{{shop_config('upload.upload_type')}}'
                // ,before: function(obj){
                //     //预读本地文件示例，不支持ie8
                //     obj.preview(function(index, file, result){
                //         $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                //     });
                // }
                , done: function (res) {
                    //上传完毕
                    $('#demo2').append('<span  onclick="delImage(this)">\n' +
                        '                                                    <button class="layui-btn layui-btn-xs "  style="position: absolute;margin-left: 53px" type="button" >\n' +
                        '                                                        <i class="layui-icon"></i></button><img src="' + res.data.src + '" alt="" width="80" height="80" class="layui-upload-img">' +
                        '<input type="hidden" name="pics[]" value="' + res.data.src+ '"></span>'
                    )
                }
            });
        });
        // vue 添加
        new Vue({
            el:'#app',
            // 数据
            data:{
                specs:{!! $specs !!}

            },
            // 接受方法
            methods:{
                    //增加
                add(){
                this.specs.push({spec:'',total:''})
                },
                // 删除
                del(k){
                    this.specs.splice(k,1);
                }

            }


        })
    </script>

@endpush



