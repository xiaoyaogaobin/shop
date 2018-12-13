@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">上传配置</a>
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
                    <h5>上传配置
                        <small class="text-danger">请谨慎上传您的配置</small>
                    </h5>


                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('admin.config.update',['name'=>$name])}} " id="myform">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上传大小(upload_size)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['upload_size']??''}}" placeholder="上传单位为B"  name="upload_size" class="form-control">
                            </div>
                        </div>


                        {{--商品列表图片--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上传类型(upload_type)
                            </label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['upload_type']??'jpg|png|jpeg'}}" placeholder="jpg|png|gif|bmp|jpeg"  name="upload_type" class="form-control">
                            </div>
                            <span class="help-block m-b-none text-info " style="    margin-left: 250px !important;padding-top:35px!important;">允许上传的文件后缀:格式:jpg|png|gif|bmp|jpeg,一般情况下,应该跟 筛选文件类型 保持一致 如果未设置:默认使用 jpg|png|jpeg</span>
                        </div>
                        {{--商品图册--}}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">筛选文件类型 备案信息(upload_accept_mime)
                            </label>

                            <div class="col-sm-10">
                                <input type="text" value="{{$config['data']['upload_accept_mime']??''}}"placeholder="如:image/jpg, image/png" name="upload_accept_mime" class="form-control">
                            </div>
                            <span class="help-block m-b-none  text-danger " style="    margin-left: 250px !important;padding-top:35px!important;">规定打开文件选择框时，筛选出的文件类型，值为用逗号隔开的 MIME 类型列表。如：acceptMime: 'image/*'（只显示图片文件） acceptMime: 'image/jpg, image/png'（只显示 jpg 和 png 文件） 如果未设置:默认使用 image/jpg, image/png,image/jpeg</span>
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



